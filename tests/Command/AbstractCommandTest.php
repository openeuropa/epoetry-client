<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Command;

use donatj\MockWebServer\MockWebServer;
use OpenEuropa\EPoetry\Tests\AbstractTest;

/**
 * AbstractCommandTest allows to setup and start/stop a mock web server.
 */
abstract class AbstractCommandTest extends AbstractTest
{
    /** @var MockWebServer */
    protected static $mockWebServer;

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        self::$mockWebServer = new MockWebServer();
        self::$mockWebServer->start();
    }

    /**
     * {@inheritdoc}
     */
    public static function tearDownAfterClass()
    {
        self::$mockWebServer->stop();
    }

    /**
     * {@inheritdoc}
     */
    public function getFixtureContent(string $filename): string
    {
        return parent::getFixtureContent(__DIR__ . '/../fixtures/Command/' . $filename);
    }
}
