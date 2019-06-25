<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Command;

use OpenEuropa\EPoetry\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @internal
 * @coversNothing
 */
final class ReceiveNotificationCommandTest extends AbstractCommandTest
{
    /**
     * Data provider.
     *
     * @return array
     */
    public function responseParsingCases(): array
    {
        return $this->getFixture('receive-notification.yml');
    }

    /**
     * Test parsing a SOAP notification.
     *
     * @param array $input
     * @param mixed $expectations
     *
     * @dataProvider responseParsingCases
     *
     * @runInSeparateProcess
     */
    public function testReceiveNotificationCommand(array $input, $expectations): void
    {
        $app = new Application();
        $command = $app->find($input['command']);

        $commandTester = new CommandTester($command);
        $commandTester->execute([
            '--endpoint' => 'http://localhost',
            '--in-format' => $input['in-format'],
            '--out-format' => $input['out-format'],
            'file' => $input['file'],
        ]);

        $output = $commandTester->getDisplay();

        $output = preg_replace("/\r|\n/", '', $output);
        $expectationsOutput = preg_replace("/\r|\n/", '', $expectations['response']);
        static::assertEquals($output, $expectationsOutput);
    }
}
