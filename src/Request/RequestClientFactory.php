<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request;

use OpenEuropa\EPoetry\ClientFactory;
use Phpro\SoapClient\Soap\ClassMap\ClassMapCollection;

/**
 * Factory class for the ePoetry SOAP service.
 */
class RequestClientFactory extends ClientFactory
{
    /**
     * Name of client class.
     *
     * @var string
     */
    protected $clientName = RequestClient::class;

    /**
     * Names of WSDL file in resources folder.
     *
     * @var string
     */
    protected $wsdlFile = 'dgtServiceWSDL.xml';

    /**
     * Names of XSD file in resources folder.
     *
     * @var string
     */
    protected $xsdFile = 'dgtServiceXSD.xml';

    /**
     * Return client mapping.
     *
     * @return ClassMapCollection
     */
    protected function getClassMapCollection()
    {
        return RequestClassmap::getCollection();
    }
}
