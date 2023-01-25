<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates CreateLinguisticRequest class.
 */
class CreateLinguisticRequestConstraintValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($linguisticRequest, Constraint $constraint)
    {
        if (!$constraint instanceof CreateLinguisticRequestConstraint) {
            throw new UnexpectedTypeException($constraint, CreateLinguisticRequestConstraint::class);
        }

        /** @var \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest $linguisticRequest */
        $this->validateRequestedDeadline($linguisticRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint);
        $this->validateWorkflowCode($linguisticRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint);
        $this->validateContacts($linguisticRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint);
        $this->validateSlaAnnex($linguisticRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint);
        $this->validateSlaCommitment($linguisticRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint);
        $this->validateSentViaRue($linguisticRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint);
        $this->validateDestination($linguisticRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint);
        $this->validateProcedure($linguisticRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint);
    }

    /**
     * Validates workflow code value.
     */
    protected function validateWorkflowCode($templateName, $requestDetails, Constraint $constraint, $atPathPrefix = ''): void
    {
        if (!$requestDetails->hasWorkflowCode()) {
            return;
        }
        // Only the following combinations between template codes and workflow codes are accepted.
        // We use an empty string to indicate that a workflow code can be optionally set, for the related template.
        $mapping = [
            'DEFAULT' => ['', 'STS'],
            'WEBTRA' => ['WEB'],
            'HOTL' => ['HOTL'],
            'EDT' => ['', 'STS'],
            'WEBEDT' => ['WEB'],
            'RSE' => [''],
            'RSO' => [''],
            'SPO' => ['', 'WEB'],
            'PP' => ['PP'],
            'QE' => ['QE'],
        ];
        $workflowCode = $requestDetails->getWorkflowCode();

        if (isset($mapping[$templateName]) && !in_array($workflowCode, $mapping[$templateName])) {
            $this->context->buildViolation($constraint->workflowCodeMessage)
                ->atPath($atPathPrefix . 'requestDetails.workflowCode')
                ->setParameter('{{ code }}', $workflowCode)
                ->setParameter('{{ template }}', $templateName)
                ->addViolation();
        }
    }

    protected function getProductCode($templateName) : string
    {
        $mapping = [
            'DEFAULT' => 'TRA',
            'WEBTRA' => 'TRA',
            'HOTL' => 'TRA',
            'EDT' => 'EDT',
            'WEBEDT' => 'EDT',
            'RSE' => 'RSE',
            'RSO' => 'RSO',
            'SPO' => 'SPO',
            'PP' => 'TRA',
            'QE' => 'TRA',
        ];

        return $mapping[$templateName] ?? '';
    }

    /**
     * Validates workflow code value.
     */
    protected function validateContacts($templateName, $requestDetails, Constraint $constraint, $atPathPrefix = ''): void
    {
        if (!$requestDetails->hasContacts()) {
            return;
        }
        $contacts = $requestDetails->getContacts()->getContact();
        $results = [];
        foreach ($contacts as $contact) {
            $contactRole = $contact->getContactRole();
            if (!isset($results[$contactRole])) {
                $results[$contactRole] = 1;
            } else {
                $results[$contactRole]++;
            }
        }
        // Rules for contacts validation. Each rule consist of values:
        // - "templateName" contains template code where the rule should be applied on.
        // - "roles" contains number of maximum roles can be available in contacts.
        $rules = [
            [
                'templateName' => ['DEFAULT', 'EDT', 'HOTL', 'PP', 'QE', 'SPO', 'RSO', 'RSE'],
                'roles' => [
                    'REQUESTER' => 3,
                    'AUTHOR' => 3,
                    'RECIPIENT' => 6,
                ],
            ],
            [
                'templateName' => ['WEBTRA'],
                'roles' => [
                    'WEBMASTER' => 3,
                    'EDITOR' => 3,
                    'RECIPIENT' => 6,
                ],
            ],
            [
                'templateName' => ['WEBEDT'],
                'roles' => [
                    'WEBMASTER' => 3,
                    'AUTHOR' => 3,
                    'RECIPIENT' => 6,
                ],
            ],
        ];
        foreach ($rules as $rule) {
            if (in_array($templateName, $rule['templateName'])) {
                foreach ($rule['roles'] as $roleName => $count) {
                    if (!isset($results[$roleName])) {
                        // Check roles that are required.
                        $this->context->buildViolation($constraint->contactsMinimumMessage)
                            ->atPath($atPathPrefix . 'requestDetails.contacts')
                            ->setParameter('{{ role }}', $roleName)
                            ->addViolation();
                    } elseif ($results[$roleName] > $count) {
                        // Check amount of roles.
                        $this->context->buildViolation($constraint->contactsMaximumMessage)
                            ->atPath($atPathPrefix . 'requestDetails.contacts')
                            ->setParameter('{{ count }}', $count)
                            ->setParameter('{{ role }}', $roleName)
                            ->addViolation();
                    }
                }
            }
        }
    }

    /**
     * Validates slaAnnex value.
     */
    protected function validateSlaAnnex($templateName, $requestDetails, Constraint $constraint, $atPathPrefix = ''): void
    {
        if (!in_array($templateName, ['RSE', 'RSO', 'HOTL', 'EDT', 'WEBEDT'])
            && !in_array($requestDetails->getSlaAnnex(), ['NO', 'ANNEX8A', 'ANNEX8B'])) {
            // SlaAnnex is required, only specific options are possible.
            $this->context->buildViolation($constraint->slaAnnexRequiredMessage)
                ->atPath($atPathPrefix . 'requestDetails.slaAnnex')
                ->addViolation();
        }
    }

    /**
     * Validates slaCommitment value.
     */
    protected function validateSlaCommitment($templateName, $requestDetails, Constraint $constraint, $atPathPrefix = ''): void
    {
        // Current validation does not enforce the slaCommitent value to be a correct slaCommitent value defined if ABAC.
        if (!in_array($templateName, ['RSE', 'RSO', 'HOTL', 'EDT', 'WEBEDT'])
            && $requestDetails->hasSlaAnnex()
            && $requestDetails->getSlaAnnex() === 'ANNEX8B'
            && !$requestDetails->hasSlaCommitment()) {
            $this->context->buildViolation($constraint->slaCommitmentRequiredMessage)
                ->atPath($atPathPrefix . 'requestDetails.slaCommitment')
                ->addViolation();
        }
    }

    /**
     * Validates sentViaRue value.
     */
    protected function validateSentViaRue($templateName, $requestDetails, Constraint $constraint, $atPathPrefix = ''): void
    {
        $productCode = $this->getProductCode($templateName);
        // From the spec:
        // - true only if sensitive value is true;
        // - true only for TRA and EDT product type;
        // Currently we combine both rules using "OR" condition.
        if ($requestDetails->hasSentViaRue()) {
            if (!$requestDetails->hasSensitive()) {
                $this->context->buildViolation($constraint->sentViaRueSensitiveMessage)
                    ->atPath($atPathPrefix . 'requestDetails.sentViaRue')
                    ->addViolation();
            }
            if (!in_array($productCode, ['TRA', 'EDT'])) {
                $this->context->buildViolation($constraint->sentViaRueProductTypeMessage)
                    ->atPath($atPathPrefix . 'requestDetails.sentViaRue')
                    ->setParameter('{{ product }}', $productCode)
                    ->addViolation();
            }
        }
    }

    /**
     * Validates destination value.
     */
    protected function validateDestination($templateName, $requestDetails, Constraint $constraint, $atPathPrefix = ''): void
    {
        if (!in_array($templateName, ['HOTL', 'RSE', 'RSO'])
            && !in_array($requestDetails->getDestination(), ['EM', 'EXT', 'IE', 'INTERNE', 'JO', 'PUBLIC'])) {
            $this->context->buildViolation($constraint->destinationRequiredMessage)
                ->atPath($atPathPrefix . 'requestDetails.destination')
                ->addViolation();
        }
    }

    /**
     * Validates procedure value.
     */
    protected function validateProcedure($templateName, $requestDetails, Constraint $constraint, $atPathPrefix = ''): void
    {
        if (!in_array($templateName, ['HOTL', 'RSE', 'RSO'])
            && !in_array($requestDetails->getProcedure(), ['DEGHP', 'NEANT', 'PROAC', 'PROCD', 'PROCE', 'PROCH', 'PROCO', 'REUNAU', 'REUNCS'])) {
            $this->context->buildViolation($constraint->procedureRequiredMessage)
                ->atPath($atPathPrefix . 'requestDetails.procedure')
                ->addViolation();
        }
    }

    /**
     * Validates requested deadline value.
     */
    protected function validateRequestedDeadline($templateName, $requestDetails, Constraint $constraint, $atPathPrefix = ''): void
    {
        if ($templateName === 'HOTL') {
            return;
        } elseif (!$requestDetails->hasRequestedDeadline()) {
            $this->context->buildViolation($constraint->requestedDeadlineRequiredMessage)
                ->atPath($atPathPrefix . 'requestDetails.requestedDeadline')
                ->addViolation();
        } elseif ($requestDetails->getRequestedDeadline()->getTimestamp() < time()) {
            $this->context->buildViolation($constraint->requestedDeadlinePastMessage)
                ->atPath($atPathPrefix . 'requestDetails.requestedDeadline')
                ->addViolation();
        }
    }
}
