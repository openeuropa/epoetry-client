<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Services;

use Phpro\SoapClient\Event\FaultEvent;
use Phpro\SoapClient\Event\RequestEvent;
use Phpro\SoapClient\Event\ResponseEvent;
use Phpro\SoapClient\Events;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class ePoetryLogPlugin.
 */
class LoggerSubscriber implements EventSubscriberInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Constructor.
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
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
        $this->logger->error(
            'Fault {message} for request {method} with params {request}',
            [
                'message' => $event->getSoapException()->getMessage(),
                'method' => $event->getRequestEvent()->getMethod(),
                'request' => $event->getRequestEvent()->getRequest(),
            ]
        );
    }

    /**
     * @param RequestEvent $event
     */
    public function onClientRequest(RequestEvent $event): void
    {
        $this->logger->info(
            'Request: call {method} with params {request}',
            [
                'method' => $event->getMethod(),
                'request' => $event->getRequest(),
            ]
        );
    }

    /**
     * @param ResponseEvent $event
     */
    public function onClientResponse(ResponseEvent $event): void
    {
        $this->logger->info(
            'Response: {response}',
            [
                'response' => $event->getResponse(),
            ]
        );
    }
}
