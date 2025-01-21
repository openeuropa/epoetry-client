<?php

use OpenEuropa\EPoetry\CodeGenerator\ConfigProcessor;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\Soap\CodeGeneratorEngineFactory;

$engine = CodeGeneratorEngineFactory::create('./resources/notification.wsdl');
$config = Config::create()
    ->setEngine($engine)
    ->setTypeDestination('src/Notification/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Notification\Type')
    ->setClientDestination('src/Notification/')
    ->setClientNamespace('OpenEuropa\EPoetry\Notification')
    ->setClassMapDestination('src/Notification/')
    ->setClassMapName('NotificationClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Notification')
;

return ConfigProcessor::addRules($config);
