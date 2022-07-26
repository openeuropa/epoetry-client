<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\NotificationClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Event\Subscriber\ValidatorSubscriber;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\Engine\Transport;
use Phpro\SoapClient\Event\Subscriber\LogSubscriber;
use Psr\Log\LoggerInterface;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Validator\ValidatorBuilder;

class NotificationClientFactory
{
    public static function factory(string $endpoint, ?LoggerInterface $logger = null, ?Transport $transport = null): NotificationClient
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('DgtClientNotificationReceiverWSPort', $endpoint);
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../resources/notification.wsdl', [])
                ->withClassMap(NotificationClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            $transport
        );

        // Create event dispatcher.
        $eventDispatcher = new EventDispatcher();

        // Build validator with Validator Subscriber.
        $validatorBuilder = new ValidatorBuilder();
        $validatorBuilder->addYamlMapping(__DIR__.'/../config/validator/notification.yaml');
        $validator = $validatorBuilder->getValidator();
        $eventDispatcher->addSubscriber(new ValidatorSubscriber($validator));

        // Set logger, if any.
        if ($logger) {
            $eventDispatcher->addSubscriber(new LogSubscriber($logger));
        }

        // Build caller.
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        // Build notification client.
        return new NotificationClient($caller);
    }
}
