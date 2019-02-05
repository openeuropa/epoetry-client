<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Plugin;

use Phpro\SoapClient\Event\FaultEvent;
use Phpro\SoapClient\Event\RequestEvent;
use Phpro\SoapClient\Event\ResponseEvent;
use Phpro\SoapClient\Events;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class ePoetryLogPlugin
 */
class EPoetryLogPlugin implements EventSubscriberInterface
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var bool | string
     */
    protected $logLevel = false;

    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger, $log_level)
    {
        $this->logger = $logger;
        $this->logLevel = $log_level;
    }

    /**
     * @param RequestEvent $event
     */
    public function onClientRequest(RequestEvent $event): void
    {
        $this->logInfo(sprintf(
            '[phpro/soap-client] request: call "%s" with params %s',
            $event->getMethod(),
            print_r($event->getRequest(), true)
        ));
    }

    /**
     * @param ResponseEvent $event
     */
    public function onClientResponse(ResponseEvent $event): void
    {
        $this->logInfo(sprintf(
            '[phpro/soap-client] response: %s',
            print_r($event->getResponse(), true)
        ));
    }

    /**
     * @param FaultEvent $event
     */
    public function onClientFault(FaultEvent $event): void
    {
        $this->logError(sprintf(
            '[phpro/soap-client] fault "%s" for request "%s" with params %s',
            $event->getSoapException()->getMessage(),
            $event->getRequestEvent()->getMethod(),
            print_r($event->getRequestEvent()->getRequest(), true)
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents(): array
    {
        return array(
            Events::REQUEST  => 'onClientRequest',
            Events::RESPONSE => 'onClientResponse',
            Events::FAULT    => 'onClientFault'
        );
    }

    /**
     * Log info messages.
     *
     * @param string $message
     * @param array  $context
     */
    private function logInfo($message, array $context = []): void
    {
        if ($this->canLogLevel(LogLevel::INFO)) {
            $this->logger->info($message, $context);
        }
    }

    /**
     * Log error messages.
     *
     * @param string $message
     * @param array  $context
     */
    private function logError($message, array $context = []): void
    {
        if ($this->canLogLevel(LogLevel::ERROR)) {
            $this->logger->error($message, $context);
        }
    }

    /**
     * Decide if the we can log a specific level.
     *
     * @param string $level
     *
     * @return bool
     */
    private function canLogLevel($level): bool
    {
        $levels = [
            LogLevel::DEBUG,
            LogLevel::INFO,
            LogLevel::NOTICE,
            LogLevel::WARNING,
            LogLevel::ERROR,
            LogLevel::CRITICAL,
            LogLevel::ALERT,
            LogLevel::EMERGENCY,
        ];
        $key = array_search($this->logLevel, $levels);
        $levels = array_slice($levels, $key);

        return ($this->logLevel !== false) && in_array($level, $levels);
    }
}
