<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

/**
 * @Annotation
 */
class DgtNotificationConstraint extends BaseConstraint
{
    public $propertyRequiredMessage = '"{{ property }}" value is required for "{{ notificationType }}" notification type.';
}
