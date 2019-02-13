<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Logger;

use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

/**
 * Class MockLogger.
 */
class MockLogger extends AbstractLogger
{
    /**
     * Test log storage.
     *
     * @var array
     */
    public $logs = [
        LogLevel::EMERGENCY => [],
        LogLevel::ALERT => [],
        LogLevel::CRITICAL => [],
        LogLevel::ERROR => [],
        LogLevel::WARNING => [],
        LogLevel::NOTICE => [],
        LogLevel::INFO => [],
        LogLevel::DEBUG => [],
    ];

    /**
     * Get logs.
     *
     * @return array
     *   Property value
     */
    public function getLogs(): array
    {
        return $this->logs;
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = [])
    {
        $this->logs[$level][] = [
            'message' => $message,
            'context' => $context,
        ];
    }
}
