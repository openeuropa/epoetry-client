<?php

namespace OpenEuropa\EPoetry\Console\Monolog;

use Monolog\Handler\HandlerInterface;
use React\EventLoop\LoopInterface;
use React\Stream\WritableResourceStream;
use React\Stream\WritableStreamInterface;
use Symfony\Bridge\Monolog\Handler\ConsoleHandler;
use Symfony\Component\Console\Output\StreamOutput;
use Monolog\LogRecord;

/**
 * Bridge Monolog console handler with ReactPHP loop system.
 */
class ReactConsoleHandler implements HandlerInterface
{
    /**
     * @var WritableStreamInterface
     */
    protected WritableStreamInterface $stream;

    /**
     * @var ConsoleHandler
     */
    protected ConsoleHandler $consoleHandler;

    /**
     * Verbosity level
     * @var int
     */
    protected int $verbosity;

    public function __construct(LoopInterface $loop, StreamOutput $output = null, bool $bubble = true, array $verbosityLevelMap = [], array $consoleFormatterOptions = [])
    {
        $this->consoleHandler = new ConsoleHandler($output, $bubble, $verbosityLevelMap, [
            'format' => "%datetime% %level_name% [%channel%] %message%%context%%extra%\n",
            'colors' => false,
        ] + $consoleFormatterOptions);
        $this->stream = new WritableResourceStream($output->getStream(), $loop);
        $this->verbosity = $output->getVerbosity();
    }

    /**
     * {@inheritdoc}
     */
    protected function write(array|LogRecord $record): void
    {
        if ($this->verbosity >= $this->consoleHandler->getLevel()) {
            $this->stream->write((string) $record['formatted']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isHandling(LogRecord $record): bool
    {
        return $this->consoleHandler->isHandling($record);
    }

    /**
     * {@inheritdoc}
     */
    public function handle(LogRecord $record): bool
    {
        return $this->consoleHandler->handle($record);
    }

    /**
     * {@inheritdoc}
     */
    public function handleBatch(array $records): void
    {
        $this->consoleHandler->handleBatch($records);
    }

    /**
     * {@inheritdoc}
     */
    public function close(): void
    {
        $this->consoleHandler->close();
    }

    /**
     * {@inheritdoc}
     */
    public function setFormatter($formatter)
    {
        $this->consoleHandler->setFormatter($formatter);
    }

    /**
     * {@inheritdoc}
     */
    public function getFormatter()
    {
        return $this->consoleHandler->getFormatter();
    }
}
