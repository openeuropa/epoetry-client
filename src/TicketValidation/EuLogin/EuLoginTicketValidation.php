<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin;

use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class EuLoginTicketValidation implements TicketValidationInterface
{
    /**
     * {@inheritDoc}
     */
    public function validate(string $account, string $ticket): bool
    {
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../../../resources/ticket-validation.wsdl', [])
                ->withClassMap(EuLoginTicketValidationClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        $client = new EuLoginTicketValidationClient($caller);
        // @todo implement this correctly.
        return false;
    }
}
