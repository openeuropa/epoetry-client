<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

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
     * @return NotificationServer
     */
    public function getSoapServer(): NotificationServer
    {
        $this->setNotificationData();
        $options = ExtSoapOptionsResolverFactory::create()->resolve([
            'classmap' => NotificationClassmap::getCollection(),
        ]);

        return new NotificationServer($this->buildWsdl(), $options);
    }
}
