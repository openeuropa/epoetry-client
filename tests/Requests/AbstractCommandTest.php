<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use InterNations\Component\HttpMock\PHPUnit\HttpMockTrait;
use OpenEuropa\EPoetry\Tests\AbstractTest;
use Symfony\Component\Yaml\Yaml;

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
     * @param string $filename
     *
     * @return mixed
     */
    public function getFixture(string $filename)
    {
        return Yaml::parseFile(__DIR__ . '/../fixtures/command/' . $filename);
    }
}
