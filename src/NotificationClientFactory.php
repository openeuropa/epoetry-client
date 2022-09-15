<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\NotificationClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\Engine\Engine;
use Soap\ExtSoapEngine\ExtSoapOptions;

class NotificationClientFactory extends BaseClientFactory
{
    /**
     * {@inheritdoc}
     */
    protected function getEngine(): Engine
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('DgtClientNotificationReceiverWSPort', $this->endpoint);
        return DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../resources/notification.wsdl', [])
                ->withClassMap(NotificationClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            $this->transport
        );
    }

    /**
     * Gets notification client.
     *
     * @return NotificationClient
     *   RequestClient instance.
     */
    public function getNotificationClient(): NotificationClient
    {
        $this->addValidatior(__DIR__ . '/../config/validator/notification.yaml');
        $this->addLogger();

        // Build caller.
        $caller = new EventDispatchingCaller(new EngineCaller($this->getEngine()), $this->eventDispatcher);

        // Build request client.
        return new NotificationClient($caller);
    }
}
