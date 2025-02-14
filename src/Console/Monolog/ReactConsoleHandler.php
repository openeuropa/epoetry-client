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
 *
 * @todo remove phpstan ignore in 4.x.
 */
/** @phpstan-ignore-next-line */
class ReactConsoleHandler extends ConsoleHandler implements HandlerInterface
{
    /**
     * @var WritableStreamInterface
     */
    protected WritableStreamInterface $stream;

    /**
     * Verbosity level
     * @var int
     */
    protected int $verbosity;

    public function __construct(LoopInterface $loop, StreamOutput $output = null, bool $bubble = true, array $verbosityLevelMap = [], array $consoleFormatterOptions = [])
    {
        parent::__construct($output, $bubble, $verbosityLevelMap, [
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
        if ($this->verbosity >= $this->getLevel()) {
            $this->stream->write((string) $record['formatted']);
        }
    }
}
