<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Validates AddNewPartToDossier class.
 */
class AddNewPartToDossierConstraintValidator extends CreateLinguisticRequestConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($linguisticRequest, Constraint $constraint)
    {
        // Validation of business rules of CreateLinguisticRequest is based on
        // templateName value. If templateName is empty (because field is
        // optional), skip validation.
        if (empty($linguisticRequest->getTemplateName())) {
            return;
        }

        parent::validate($linguisticRequest, $constraint);
    }
}
