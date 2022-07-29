<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Notification\NotificationClient;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Event\Subscriber\LogSubscriber;
use Phpro\SoapClient\Event\Subscriber\ValidatorSubscriber;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Psr\Log\LoggerInterface;
use Soap\Engine\Transport;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Validator\ValidatorBuilder;

class RequestClientFactory
{
    public static function factory(string $endpoint, ?LoggerInterface $logger = null, ?Transport $transport = null): RequestClient
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('DGTServiceWSPort', $endpoint);
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../resources/request.wsdl', [])
                ->withClassMap(RequestClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            $transport
        );

        // Create event dispatcher.
        $eventDispatcher = new EventDispatcher();

        // Build validator with Validator Subscriber.
        $validatorBuilder = new ValidatorBuilder();
        $validatorBuilder->addYamlMapping(__DIR__.'/../config/validator/request.yaml');
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
