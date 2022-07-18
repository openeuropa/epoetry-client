<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Notification\NotificationClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Symfony\Component\EventDispatcher\EventDispatcher;

class NotificationClientFactory extends BaseClientFactory
{
    public static function factory(string $endpoint): NotificationClient
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('DgtClientNotificationReceiverWSPort', $endpoint);
        $wsdl = __DIR__.'/../resources/notification.wsdl';
        $engine = self::buildEngine($wsdl, $wsdlProvider);

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new NotificationClient($caller);
    }
}
