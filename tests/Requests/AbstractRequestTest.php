<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use OpenEuropa\EPoetry\Tests\AbstractTest;

/**
 * Class AbstractRequestTest.
 */
abstract class AbstractRequestTest extends AbstractTest
{
    /**
     * {@inheritdoc}
     */
    public function getFixtureContent(string $filename): string
    {
        return parent::getFixtureContent(__DIR__ . '/../fixtures/Requests/' . $filename);
    }
}
