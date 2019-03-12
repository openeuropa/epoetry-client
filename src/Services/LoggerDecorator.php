<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Services;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class LoggerDecorator implements LoggerInterface
{
    const LOG_MESSAGE_PREFIX = '[ePoetry] ';

    /**
     * @var string
     */
    protected $logLevel = LogLevel::EMERGENCY;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor.
     *
     * @param LoggerInterface $logger
     * @param string $logLevel
     */
    public function __construct(LoggerInterface $logger, string $logLevel)
    {
        $this->logger = $logger;
        $this->logLevel = $logLevel;
    }

    /**
     * {@inheritdoc}
     */
    public function alert($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::ALERT)) {
            $this->logger->alert(LoggerDecorator::LOG_MESSAGE_PREFIX . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function critical($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::CRITICAL)) {
            $this->logger->critical(LoggerDecorator::LOG_MESSAGE_PREFIX . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function debug($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::DEBUG)) {
            $this->logger->debug(LoggerDecorator::LOG_MESSAGE_PREFIX . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function emergency($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::EMERGENCY)) {
            $this->logger->emergency(LoggerDecorator::LOG_MESSAGE_PREFIX . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function error($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::ERROR)) {
            $this->logger->error(LoggerDecorator::LOG_MESSAGE_PREFIX . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function info($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::INFO)) {
            $this->logger->info(LoggerDecorator::LOG_MESSAGE_PREFIX . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = [])
    {
        $this->logger->log($level, LoggerDecorator::LOG_MESSAGE_PREFIX . $message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function notice($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::NOTICE)) {
            $this->logger->notice(LoggerDecorator::LOG_MESSAGE_PREFIX . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function warning($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::WARNING)) {
            $this->logger->warning(LoggerDecorator::LOG_MESSAGE_PREFIX . $message, $context);
        }
    }

    /**
     * Assert if log level is low enough to be logged.
     *
     * @param string $level
     *
     * @return bool
     */
    private function canLogLevel(string $level): bool
    {
        $levels = [
            LogLevel::EMERGENCY,
            LogLevel::ALERT,
            LogLevel::CRITICAL,
            LogLevel::ERROR,
            LogLevel::WARNING,
            LogLevel::NOTICE,
            LogLevel::INFO,
            LogLevel::DEBUG,
        ];
        $key = array_search($this->logLevel, $levels, true);
        if ($key) {
            $levels = \array_slice($levels, $key);
        }

        return ($this->logLevel !== false) && \in_array($level, $levels, true);
    }
}
