<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

/**
 * @Annotation
 */
class RequestDetailsInConstraint extends BaseConstraint
{
    public $productsLanguageMessage = 'Product list must not include language "{{ language }}" since it is defined as a single source language in the "linguisticSections"';
}
