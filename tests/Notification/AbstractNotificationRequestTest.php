<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use OpenEuropa\EPoetry\Tests\AbstractTest;

/**
 * Class AbstractNotificationRequestTest.
 */
abstract class AbstractNotificationRequestTest extends AbstractTest
{
    /**
     * {@inheritdoc}
     */
    public function getFixtureContent(string $filename): string
    {
        return parent::getFixtureContent(__DIR__ . '/../fixtures/Notification/' . $filename);
    }
}
