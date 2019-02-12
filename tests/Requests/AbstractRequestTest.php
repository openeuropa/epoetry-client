<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

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
        return Yaml::parseFile(__DIR__ . '/../fixtures/requests/' . $filename);
    }
}
