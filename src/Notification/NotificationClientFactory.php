<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\ClientFactory;
use Phpro\SoapClient\Soap\ClassMap\ClassMapCollection;

/**
 * Class NotificationClientFactory.
 */
class NotificationClientFactory extends ClientFactory
{
    /**
     * Name of client class.
     *
     * @var string
     */
    protected $clientName = NotificationClient::class;

    /**
     * Names of WSDL file in resources folder.
     *
     * @var string
     */
    protected $wsdlFile = 'NotificationServiceWSDL.xml';

    /**
     * Names of XSD file in resources folder.
     *
     * @var string
     */
    protected $xsdFile = 'NotificationServiceXSD.xml';

    /**
     * Return client mapping.
     *
     * @return ClassMapCollection
     */
    protected function getClassMapCollection()
    {
        return NotificationClassmap::getCollection();
    }
}
