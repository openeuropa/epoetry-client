<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Command;

use donatj\MockWebServer\Response;
use OpenEuropa\EPoetry\Console\Application;
use OpenEuropa\EPoetry\Tests\Requests\AbstractCommandTest;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @internal
 * @coversNothing
 */
final class CreateRequestsCommandTest extends AbstractCommandTest
{
    /**
     * Data provider.
     *
     * @return mixed
     */
    public function dataProvider()
    {
        return $this->getFixture('create-requests.yml');
    }

    /**
     * Test execution of commands.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param array $expectations
     */
    public function testExecute(array $input, array $expectations)
    {
        self::$mockWebServer->setResponseOfPath('/foo', new Response(file_get_contents($input['response'])));

        $app = new Application();
        $command = $app->find($input['command']);

        $commandTester = new CommandTester($command);
        $commandTester->execute([
            '--endpoint' => self::$mockWebServer->getServerRoot() . '/foo',
            '--in-format' => $input['in-format'],
            '--out-format' => $input['out-format'],
            'request-file' => $input['request-file'],
        ]);

        $output = $commandTester->getDisplay();

        $output = preg_replace("/\r|\n/", '', $output);
        $expectationsOutput = preg_replace("/\r|\n/", '', $expectations['response']);
        $this->assertEquals($output, $expectationsOutput);
    }
}
