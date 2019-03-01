<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use donatj\MockWebServer\MockWebServer;
use OpenEuropa\EPoetry\Tests\AbstractTest;

/**
 * Class AbstractRequestTest.
 */
abstract class AbstractCommandTest extends AbstractTest
{
    /**
     * @var MockWebServer
     */
    public $mockWebServer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->mockWebServer = new MockWebServer(8082);
        $this->mockWebServer->start();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        $this->mockWebServer->stop();
    }

    /**
     * {@inheritdoc}
     */
    public function getFixtureContent(string $filename): string
    {
        return parent::getFixtureContent(__DIR__ . '/../fixtures/Command/' . $filename);
    }
}
