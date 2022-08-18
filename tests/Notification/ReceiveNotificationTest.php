<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use OpenEuropa\EPoetry\Tests\Notification\BaseNotificationTest;

/**
 * Test ReceiveNotification.
 */
final class ReceiveNotificationTest extends BaseNotificationTest
{
    /**
     * Tests notification xml into object conversion.
     *
     * @dataProvider dataProviderReceiveNotification
     */
    public function testReceiveNotification($notification, $expectations): void
    {
        $xml = file_get_contents(__DIR__ . '/fixtures/' . $notification);
        $object = $this->serializer->deserialize($xml, 'OpenEuropa\EPoetry\Notification\Type\ReceiveNotification', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['notification' => $object]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderReceiveNotification(): array
    {
        return $this->getFixture('receiveNotification.yaml', '/Notification');
    }

    /**
     * Test validation of RequestStatusChange notification.
     *
     * @dataProvider dataProviderValidation
     */
    public function testValidation($data, $expectations): void
    {
        $notification = $this->serializer->denormalize($data, 'OpenEuropa\EPoetry\Notification\Type\ReceiveNotification');
        $violations = $this->validator->validate($notification);
        $values = [
            'violations' => $violations,
        ];
        $this->assertExpressionLanguageExpressions($expectations['assertions'], $values);
    }

    /**
     * Data provider.
     *
     * The actual data is read from fixtures stored in a YAML configuration.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderValidation(): array
    {
        return $this->getFixture('receiveNotificationValidation.yaml', '/Notification')['tests'];
    }
}
