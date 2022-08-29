<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

/**
 * @Annotation
 */
class ProductConstraint extends BaseConstraint
{
    public $propertyRequiredMessage = '"{{ property }}" value is required when product status is "{{ status }}".';
}
