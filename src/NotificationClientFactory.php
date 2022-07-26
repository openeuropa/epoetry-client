<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Notification\NotificationClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Soap\Engine\Transport;
use Phpro\SoapClient\Event\Subscriber\LogSubscriber;
use Psr\Log\LoggerInterface;

class NotificationClientFactory extends BaseClientFactory
{
    public static function factory(string $endpoint, ?LoggerInterface $logger = null, ?Transport $transport = null): NotificationClient
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('DgtClientNotificationReceiverWSPort', $endpoint);
        $wsdl = __DIR__.'/../resources/notification.wsdl';
        $engine = self::buildEngine($wsdl, $wsdlProvider, $transport);

        $eventDispatcher = self::buildEventDispatcher(__DIR__.'/../config/validator/notification.yaml');
        if ($logger) {
            $eventDispatcher->addSubscriber(new LogSubscriber($logger));
        }
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new NotificationClient($caller);
    }
}
