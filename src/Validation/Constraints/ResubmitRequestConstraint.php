<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

/**
 * @Annotation
 */
class ResubmitRequestConstraint extends CreateLinguisticRequestConstraint
{
    public $requestedSensitiveMessage = '"sensitive" should not be set in resubmitRequest.';

    public $requestedSentViaRueMessage = '"sentViaRue" should not be set in resubmitRequest.';

    public $requestedOnBehalfOfMessage = '"onBehalfOf" should not be set in resubmitRequest.';
}
