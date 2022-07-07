<?php

use OpenEuropa\EPoetry\CodeGenerator\ConfigProcessor;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Soap\DefaultEngineFactory;

$config = Config::create()
    ->setEngine($engine = DefaultEngineFactory::create(
        ExtSoapOptions::defaults('./resources/DgtClientNotificationReceiverWS.wsdl', [])
            ->disableWsdlCache()
    ))
    ->setTypeDestination('src/Notification/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Notification\Type')
    ->setClientDestination('src/Notification/')
    ->setClientName('NotificationClient')
    ->setClientNamespace('OpenEuropa\EPoetry\Notification')
    ->setClassMapDestination('src/Notification/')
    ->setClassMapName('NotificationClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Notification');

return ConfigProcessor::addRules($config);
