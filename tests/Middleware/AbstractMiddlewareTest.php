<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use OpenEuropa\EPoetry\Tests\AbstractTest;
use Symfony\Component\Yaml\Yaml;

/**
 * Class AbstractMiddlewareTest.
 */
abstract class AbstractMiddlewareTest extends AbstractTest
{
    /**
     * @param string $filename
     *
     * @return mixed
     */
    public function getFixture(string $filename)
    {
        return Yaml::parseFile(__DIR__ . '/../fixtures/Middleware/' . $filename);
    }
}
