<?php

namespace OpenEuropa\EPoetry;

use Http\Client\Common\PluginClient;
use Http\Discovery\Psr18ClientDiscovery;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Event\Subscriber\LogSubscriber;
use Phpro\SoapClient\Event\Subscriber\ValidatorSubscriber;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Psr\Log\LoggerInterface;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\Psr18Transport\Middleware\SoapHeaderMiddleware;
use Soap\Psr18Transport\Psr18Transport;
use Soap\Xml\Builder\SoapHeader;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\Validator\ValidatorBuilder;
use function VeeWee\Xml\Dom\Builder\value;

class RequestClientFactory
{
    public static function factory(string $endpoint, ?LoggerInterface $logger = null, ?string $proxyTicket = null): RequestClient
    {
        $transport = null;
        if ($proxyTicket) {
            // Add proxy ticket to the request header.
            $middlewarePlugin = new SoapHeaderMiddleware(
                new SoapHeader(
                    'https://ecas.ec.europa.eu/cas/schemas/ws',
                    'ecas:ProxyTicket',
                    value($proxyTicket),
                )
            );

            $transport = Psr18Transport::createForClient(
                new PluginClient(
                    Psr18ClientDiscovery::find(),
                    [$middlewarePlugin]
                )
            );
        }
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

        // Build request client.
        return new RequestClient($caller);
    }

}
