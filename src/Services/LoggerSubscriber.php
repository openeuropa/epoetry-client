<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Services;

use Phpro\SoapClient\Event\FaultEvent;
use Phpro\SoapClient\Event\RequestEvent;
use Phpro\SoapClient\Event\ResponseEvent;
use Phpro\SoapClient\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class ePoetryLogPlugin.
 */
class LoggerSubscriber implements EventSubscriberInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Services\Logger
     */
    protected $logger;

    /**
     * Constructor.
     *
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents(): array
    {
        return [
            Events::REQUEST => 'onClientRequest',
            Events::RESPONSE => 'onClientResponse',
            Events::FAULT => 'onClientFault',
        ];
    }

    /**
     * @param FaultEvent $event
     */
    public function onClientFault(FaultEvent $event): void
    {
        $this->logger->logInfo(sprintf(
            '[epoetry] fault "%s" for request "%s" with params %s',
            $event->getSoapException()->getMessage(),
            $event->getRequestEvent()->getMethod(),
            print_r($event->getRequestEvent()->getRequest(), true)
        ));
    }

    /**
     * @param RequestEvent $event
     */
    public function onClientRequest(RequestEvent $event): void
    {
        $this->logger->logInfo(sprintf(
            '[epoetry] request: call "%s" with params %s',
            $event->getMethod(),
            print_r($event->getRequest(), true)
        ));
    }

    /**
     * @param ResponseEvent $event
     */
    public function onClientResponse(ResponseEvent $event): void
    {
        $this->logger->logInfo(sprintf(
            '[epoetry] response: %s',
            print_r($event->getResponse(), true)
        ));
    }
}
