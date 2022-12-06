<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use function PHPUnit\Framework\isNull;

/**
 * Validates ResubmitRequest class.
 */
class ResubmitRequestConstraintValidator extends CreateLinguisticRequestConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($resubmitRequest, Constraint $constraint)
    {
        if (!$constraint instanceof ResubmitRequestConstraint) {
            throw new UnexpectedTypeException($constraint, ResubmitRequestConstraint::class);
        }
        /** @var \OpenEuropa\EPoetry\Request\Type\ResubmitRequest $resubmitRequest */
        /** @var \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $linguisticRequest */
        $linguisticRequest = $resubmitRequest->getResubmitRequest();

        // Use same business rules from CreateLinguisticRequest.
        $this->validateRequestedDeadline($resubmitRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint, 'resubmitRequest.');
        $this->validateWorkflowCode($resubmitRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint, 'resubmitRequest.');
        $this->validateContacts($resubmitRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint, 'resubmitRequest.');
        $this->validateSlaAnnex($resubmitRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint, 'resubmitRequest.');
        $this->validateSlaCommitment($resubmitRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint, 'resubmitRequest.');
        $this->validateDestination($resubmitRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint, 'resubmitRequest.');
        $this->validateProcedure($resubmitRequest->getTemplateName(), $linguisticRequest->getRequestDetails(), $constraint, 'resubmitRequest.');

        // The client can change all values with this resubmission, except:
        //-          sensitive
        //-          sentViaRue
        //-          onBehalfOf
        if ($linguisticRequest->getRequestDetails()->isSensitive() !== null) {
            $this->context->buildViolation($constraint->requestedSensitiveMessage)
                ->atPath('resubmitRequest.requestDetails.sensitive')
                ->addViolation();
        }

        if ($linguisticRequest->getRequestDetails()->isSentViaRue() !== null) {
            $this->context->buildViolation($constraint->requestedSentViaRueMessage)
                ->atPath('resubmitRequest.requestDetails.sentViaRue')
                ->addViolation();
        }
        if ($linguisticRequest->getRequestDetails()->getOnBehalfOf() !== null) {
            $this->context->buildViolation($constraint->requestedOnBehalfOfMessage)
                ->atPath('resubmitRequest.requestDetails.onBehalfOf')
                ->addViolation();
        }
    }
}
