<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\Request\RequestClassmap;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\Engine\Engine;
use Soap\Engine\Transport;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\ExtSoapEngine\Wsdl\WsdlProvider;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Phpro\SoapClient\Event\Subscriber\ValidatorSubscriber;
use Symfony\Component\Validator\ValidatorBuilder;

class BaseClientFactory
{

    protected static function buildEngine(string $wsdlFilepath, WsdlProvider $wsdlProvider, Transport $transport): Engine
    {
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults($wsdlFilepath, [])
                ->withClassMap(RequestClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            $transport
        );

        return $engine;
    }

    protected static function buildEventDispatcher(string $yamlMappingFilepath): EventDispatcher
    {
        $eventDispatcher = new EventDispatcher();

        // Build validator with Validator Subscriber.
        $validatorBuilder = new ValidatorBuilder();
        $validatorBuilder->addYamlMapping($yamlMappingFilepath);
        $validator = $validatorBuilder->getValidator();

        $eventDispatcher->addSubscriber(new ValidatorSubscriber($validator));
        return $eventDispatcher;
    }
}
