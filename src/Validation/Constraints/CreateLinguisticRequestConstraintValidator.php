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

        $this->validateRequestedDeadline($linguisticRequest, $constraint);
        $this->validateWorkflowCode($linguisticRequest, $constraint);
        $this->validateContacts($linguisticRequest, $constraint);
        $this->validateSlaAnnex($linguisticRequest, $constraint);
        $this->validateSlaCommitment($linguisticRequest, $constraint);
        $this->validateSentViaRue($linguisticRequest, $constraint);
        $this->validateDestination($linguisticRequest, $constraint);
        $this->validateProcedure($linguisticRequest, $constraint);
    }

    /**
     * Validates workflow code value.
     */
    protected function validateWorkflowCode($linguisticRequest, Constraint $constraint): void
    {
        if (!$linguisticRequest->getRequestDetails()->hasWorkflowCode()) {
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
        $template = $linguisticRequest->getTemplateName();
        $workflowCode = $linguisticRequest->getRequestDetails()->getWorkflowCode();

        if (isset($mapping[$template]) && !in_array($workflowCode, $mapping[$template])) {
            $this->context->buildViolation($constraint->workflowCodeMessage)
                ->atPath('requestDetails.workflowCode')
                ->setParameter('{{ code }}', $workflowCode)
                ->setParameter('{{ template }}', $template)
                ->addViolation();
        }
    }

    protected function getProductCode($linguisticRequest) : string
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

        return $mapping[$linguisticRequest->getTemplateName()] ?? '';
    }

    /**
     * Validates workflow code value.
     */
    protected function validateContacts($linguisticRequest, Constraint $constraint): void
    {
        if (!$linguisticRequest->getRequestDetails()->hasContacts()) {
            return;
        }
        $templateName = $linguisticRequest->getTemplateName();
        $contacts = $linguisticRequest->getRequestDetails()->getContacts()->getContact();
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
                            ->atPath('requestDetails.contacts')
                            ->setParameter('{{ role }}', $roleName)
                            ->addViolation();
                    } elseif ($results[$roleName] > $count) {
                        // Check amount of roles.
                        $this->context->buildViolation($constraint->contactsMaximumMessage)
                            ->atPath('requestDetails.contacts')
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
    protected function validateSlaAnnex($linguisticRequest, Constraint $constraint): void
    {
        $templateName = $linguisticRequest->getTemplateName();
        if (!in_array($templateName, ['RSE', 'RSO', 'HOTL', 'EDT', 'WEBEDT'])
            && !in_array($linguisticRequest->getRequestDetails()->getSlaAnnex(), ['NO', 'ANNEX8A', 'ANNEX8B'])) {
            // SlaAnnex is required, only specific options are possible.
            $this->context->buildViolation($constraint->slaAnnexRequiredMessage)
                ->atPath('requestDetails.slaAnnex')
                ->addViolation();
        }
    }

    /**
     * Validates slaCommitment value.
     */
    protected function validateSlaCommitment($linguisticRequest, $constraint): void
    {
        // Current validation does not enforce the slaCommitent value to be a correct slaCommitent value defined if ABAC.
        $requestDetails = $linguisticRequest->getRequestDetails();
        $templateName = $linguisticRequest->getTemplateName();
        if (!in_array($templateName, ['RSE', 'RSO', 'HOTL', 'EDT', 'WEBEDT'])
            && $requestDetails->hasSlaAnnex()
            && $requestDetails->getSlaAnnex() === 'ANNEX8B'
            && !$requestDetails->hasSlaCommitment()) {
            $this->context->buildViolation($constraint->slaCommitmentRequiredMessage)
                ->atPath('requestDetails.slaCommitment')
                ->addViolation();
        }
    }

    /**
     * Validates sentViaRue value.
     */
    protected function validateSentViaRue($linguisticRequest, $constraint): void
    {
        $productCode = $this->getProductCode($linguisticRequest);
        $requestDetailsIn = $linguisticRequest->getRequestDetails();
        // From the spec:
        // - true only if sensitive value is true;
        // - true only for TRA and EDT product type;
        // Currently we combine both rules using "OR" condition.
        if ($requestDetailsIn->hasSentViaRue()) {
            if (!$requestDetailsIn->hasSensitive()) {
                $this->context->buildViolation($constraint->sentViaRueSensitiveMessage)
                    ->atPath('requestDetails.sentViaRue')
                    ->addViolation();
            }
            if (!in_array($productCode, ['TRA', 'EDT'])) {
                $this->context->buildViolation($constraint->sentViaRueProductTypeMessage)
                    ->atPath('requestDetails.sentViaRue')
                    ->setParameter('{{ product }}', $productCode)
                    ->addViolation();
            }
        }
    }

    /**
     * Validates destination value.
     */
    protected function validateDestination($linguisticRequest, $constraint): void
    {
        $templateName = $linguisticRequest->getTemplateName();
        if (!in_array($templateName, ['HOTL', 'RSE', 'RSO'])
            && !in_array($linguisticRequest->getRequestDetails()->getDestination(), ['EM', 'EXT', 'IE', 'INTERNE', 'JO', 'PUBLIC'])) {
            $this->context->buildViolation($constraint->destinationRequiredMessage)
                ->atPath('requestDetails.destination')
                ->addViolation();
        }
    }

    /**
     * Validates procedure value.
     */
    protected function validateProcedure($linguisticRequest, $constraint): void
    {
        $templateName = $linguisticRequest->getTemplateName();
        if (!in_array($templateName, ['HOTL', 'RSE', 'RSO'])
            && !in_array($linguisticRequest->getRequestDetails()->getProcedure(), ['DEGHP', 'NEANT', 'PROAC', 'PROCD', 'PROCE', 'PROCH', 'PROCO', 'REUNAU', 'REUNCS'])) {
            $this->context->buildViolation($constraint->procedureRequiredMessage)
                ->atPath('requestDetails.procedure')
                ->addViolation();
        }
    }

    /**
     * Validates requested deadline value.
     */
    protected function validateRequestedDeadline($linguisticRequest, $constraint): void
    {
        $templateName = $linguisticRequest->getTemplateName();
        if ($templateName === 'HOTL') {
            return;
        } elseif (!$linguisticRequest->getRequestDetails()->hasRequestedDeadline()) {
            $this->context->buildViolation($constraint->requestedDeadlineRequiredMessage)
                ->atPath('requestDetails.requestedDeadline')
                ->addViolation();
        } elseif ($linguisticRequest->getRequestDetails()->getRequestedDeadline()->getTimestamp() < time()) {
            $this->context->buildViolation($constraint->requestedDeadlinePastMessage)
                ->atPath('requestDetails.requestedDeadline')
                ->addViolation();
        }
    }
}
