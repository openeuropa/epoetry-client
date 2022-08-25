<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Notification;

use OpenEuropa\EPoetry\Tests\BaseTest;
use Symfony\Component\Validator\ValidatorBuilder;

/**
 * Base test class for the "Notification" ePoetry service.
 */
abstract class BaseNotificationTest extends BaseTest
{
    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Setup validator.
        $validatorBuilder = new ValidatorBuilder();
        $validatorBuilder->addYamlMapping(__DIR__ . '/../../config/validator/notification.yaml');
        $this->validator = $validatorBuilder->getValidator();
    }
}
