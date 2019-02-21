<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use OpenEuropa\EPoetry\Tests\AbstractTest;
use Symfony\Component\Yaml\Yaml;

/**
 * Class AbstractRequestTest.
 */
abstract class AbstractRequestTest extends AbstractTest
{
    /**
     * @param string $filename
     *
     * @return mixed
     */
    public function getFixture(string $filename)
    {
        return Yaml::parse($this->getFixtureContent($filename));
    }

    /**
     * @param string $filename
     *
     * @return false|string
     */
    public function getFixtureContent(string $filename)
    {
        return file_get_contents(__DIR__ . '/../fixtures/Requests/' . $filename);
    }
}
