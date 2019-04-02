<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Notification;

use OpenEuropa\EPoetry\Tests\AbstractTest;

abstract class AbstractNotificationTest extends AbstractTest
{
    /**
     * {@inheritdoc}
     */
    public function getFixtureContent(string $filename): string
    {
        return parent::getFixtureContent(__DIR__ . '/../fixtures/Notification/' . $filename);
    }
}
