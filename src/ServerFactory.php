<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

use Http\Client\HttpClient;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\NotificationServer;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptionsResolverFactory;

/**
 * Factory class for the ePoetry server.
 *
 * It can be used to get Notification server.
 */
class ServerFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    protected $wsdlFile = 'NotificationServiceWSDL.xml';

    /**
     * {@inheritdoc}
     */
    protected $xsdFile = 'NotificationServiceXSD.xml';

    /**
     * {@inheritdoc}
     */
    public function __construct($endpoint, HttpClient $httpClient, array $soapOptions = [])
    {
        parent::__construct($endpoint, $httpClient, $soapOptions);

        $this->mapCollection = NotificationClassmap::getCollection();
    }

    /**
     * @return NotificationServer
     */
    public function getSoapServer(): NotificationServer
    {
        $options = ExtSoapOptionsResolverFactory::create()->resolve([
            'classmap' => NotificationClassmap::getCollection(),
        ]);

        return new NotificationServer($this->buildWsdl(), $options);
    }
}
