<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request\Traits;

use OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrl;

/**
 * Test traits for CreateNewVersionTrait.
 */
trait UpdateCallbackUrlTrait
{
    /**
     * Builds UpdateCallbackUrl object.
     */
    protected function getUpdateCallbackUrl(): UpdateCallbackUrl
    {
        return (new UpdateCallbackUrl())
            ->setCallbackUrl('http://example.com')
            ->setApplicationName('appname');
    }
}
