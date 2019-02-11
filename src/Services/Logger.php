<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Services;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Logger
{
    /**
     * @var string
     */
    protected $logLevel = 'none';

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
    public function __construct(LoggerInterface $logger, $log_level)
    {
        $this->logger = $logger;
        $this->logLevel = $log_level;
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
