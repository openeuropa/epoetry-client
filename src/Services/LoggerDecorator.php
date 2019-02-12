<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Services;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class LoggerDecorator implements LoggerInterface
{
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
     * @param string $log_level
     */
    public function __construct(LoggerInterface $logger, string $log_level)
    {
        $this->logger = $logger;
        $this->logLevel = $log_level;
    }

    /**
     * {@inheritdoc}
     */
    public function alert($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::ALERT)) {
            $this->logger->alert('[ePoetry] ' . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function critical($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::CRITICAL)) {
            $this->logger->critical('[ePoetry] ' . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function debug($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::DEBUG)) {
            $this->logger->debug('[ePoetry] ' . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function emergency($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::EMERGENCY)) {
            $this->logger->emergency('[ePoetry] ' . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function error($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::ERROR)) {
            $this->logger->error('[ePoetry] ' . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function info($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::INFO)) {
            $this->logger->info('[ePoetry] ' . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = [])
    {
        $this->logger->log('[ePoetry] ' . $message, $context);
    }

    /**
     * Log error messages.
     *
     * @param string $message
     * @param array  $context
     */
    public function logError($message, array $context = []): void
    {
        if ($this->canLogLevel(LogLevel::ERROR)) {
            $this->logger->error($message, $context);
        }
    }

    /**
     * Log info messages.
     *
     * @param string $message
     * @param array  $context
     */
    public function logInfo($message, array $context = []): void
    {
        if ($this->canLogLevel(LogLevel::INFO)) {
            $this->logger->info($message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function notice($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::NOTICE)) {
            $this->logger->notice('[ePoetry] ' . $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function warning($message, array $context = [])
    {
        if ($this->canLogLevel(LogLevel::WARNING)) {
            $this->logger->warning('[ePoetry] ' . $message, $context);
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
        $key = array_search($this->logLevel, $levels, true);
        if ($key) {
            $levels = \array_slice($levels, $key);
        }

        return ($this->logLevel !== false) && \in_array($level, $levels, true);
    }
}
