<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Command;

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
    public function createRequestsCases()
    {
        return $this->getFixture('create-requests.yml');
    }

    /**
     * Test Proxy Ticket in request.
     *
     * @dataProvider createRequestsCases
     *
     * @param mixed $input
     */
    public function testExecute(array $input, array $expectations)
    {
        $this->http->mock
            ->when()
            ->methodIs('POST')
            ->then()
            ->statusCode(200)
            ->body($input['response'])
            ->end();
        $this->http->setUp();

        $app = new Application();
        $command = $app->find($input['command']);

        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $input['response'],
            '--endpoint' => 'http://localhost:8082',
            '--in-format' => $input['in-format'],
            '--out-format' => $input['out-format'],
            'request-file' => $input['request-file'],
        ]);

        $output = $commandTester->getDisplay();
        // print_r($output);
    }
}
