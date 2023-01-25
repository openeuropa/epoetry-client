<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request\Traits;

use OpenEuropa\EPoetry\Request\Type\DossierReference;
use OpenEuropa\EPoetry\Request\Type\GetLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\RequestReferenceIn;

/**
 * Test traits for GetLinguisticRequest.
 */
trait GetLinguisticRequestTrait
{
    /**
     * Gets test GetLinguisticRequest object.
     */
    protected function getGetLinguisticRequest(): GetLinguisticRequest
    {
        $dossierReference = (new DossierReference())
            ->setRequesterCode('CA07')
            ->setNumber(3)
            ->setYear(2021);

        $requestReference = (new RequestReferenceIn())
            ->setDossier($dossierReference)
            ->setPart(0)
            ->setProductType('TRA');

        return (new GetLinguisticRequest())
            ->setRequestReference($requestReference)
            ->setApplicationName('appname');
    }
}
