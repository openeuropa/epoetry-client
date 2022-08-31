<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

/**
 * @Annotation
 */
class ProductConstraint extends BaseConstraint
{
    public $acceptedDeadlinePastMessage = '"acceptedDeadline" cannot be in the past.';

    public $propertyRequiredMessage = '"{{ property }}" value is required when product status is "{{ status }}".';
}
