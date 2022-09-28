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

/**
 * Notification client factory.
 */
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
     *   NotificationClient instance.
     */
    public function getNotificationClient(): NotificationClient
    {
        $this->addValidatior(__DIR__ . '/../config/validator/notification.yaml');

        // Set logger, if any.
        if ($this->logger) {
            $this->addLogger($this->logger);
        }

        // Build caller.
        $caller = new EventDispatchingCaller(new EngineCaller($this->getEngine()), $this->eventDispatcher);

        // Build notification client.
        return new NotificationClient($caller);
    }
}
