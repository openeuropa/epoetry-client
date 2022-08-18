<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class RequestDetailsInConstraint extends Constraint
{
    public $productsLanguageMessage = 'Product list must not include language "{{ language }}" since it is defined as a single source language in the "linguisticSections"';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
