<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;
use OpenEuropa\EPoetry\Tests\AbstractTest;

/**
 * Class AbstractRequestTest.
 */
abstract class AbstractCommandTest extends AbstractTest
{
    use HttpMockTrait;

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        static::setUpHttpMockBeforeClass('8082', 'localhost');
    }

    /**
     * {@inheritdoc}
     */
    public static function tearDownAfterClass()
    {
        static::tearDownHttpMockAfterClass();
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->setUpHttpMock();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        $this->tearDownHttpMock();
    }

    /**
     * {@inheritdoc}
     */
    public function getFixtureContent(string $filename): string
    {
        return parent::getFixtureContent(__DIR__ . '/../fixtures/Command/' . $filename);
    }
}
