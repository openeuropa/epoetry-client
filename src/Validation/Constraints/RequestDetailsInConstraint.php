<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class RequestDetailsInConstraint extends Constraint
{
    public $decideReferenceMessage = 'Decide reference is ignored if Document to adopt is false';

    public $productsLanguageMessage = 'The list of the products should not include language "{{ language }}" since it is defined as a single source language in the linguisticSections';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
