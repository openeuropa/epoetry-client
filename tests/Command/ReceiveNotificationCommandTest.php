<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Command;

use donatj\MockWebServer\Response;
use OpenEuropa\EPoetry\Console\Application;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use OpenEuropa\EPoetry\Serializer\Serializer;
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
     */
    public function testReceiveNotificationCommand(array $input, $expectations): void
    {
        self::$mockWebServer->setResponseOfPath('/foo', new Response(file_get_contents($input['response'])));

        $app = new Application();
        $command = $app->find($input['command']);

        $commandTester = new CommandTester($command);
        $commandTester->execute([
            '--endpoint' => self::$mockWebServer->getServerRoot() . '/foo',
            '--in-format' => $input['in-format'],
            '--out-format' => $input['out-format'],
            'file' => $input['file'],
        ]);

        $output = $commandTester->getDisplay();

        $output = preg_replace("/\r|\n/", '', $output);
        $expectationsOutput = preg_replace("/\r|\n/", '', $expectations['response']);
        static::assertEquals($output, $expectationsOutput);

        return;
        $notificationSerialized = Serializer::fromString(
            $notificationXml,
            ReceiveNotification::class,
            'xml'
        );

        $values = [
            'notification' => $notificationSerialized->getNotification(),
        ];

        $this->assertExpressionLanguageExpressions(
            $expectations['assertions'],
            $values
        );
    }
}
