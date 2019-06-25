<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Notification;

use OpenEuropa\EPoetry\Serializer\Serializer;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;

/**
 * @internal
 * @coversNothing
 */
final class NotificationTest extends AbstractNotificationTest
{
    /**
     * Data provider.
     *
     * @return array
     */
    public function responseParsingCases(): array
    {
        return $this->getFixture('notification-receive-test.yml');
    }

    /**
     * Test notification client.
     *
     * @param string $notification
     * @param mixed $expectations
     *
     * @dataProvider responseParsingCases
     */
    public function testResponseClient(string $notification, $expectations): void
    {
        $notificationXml = $this->getFixtureContent($notification);

        $notificationSerialized = Serializer::fromString(
            $notificationXml,
            ReceiveNotification::class,
            'xml'
        );

        $values = [
            'notification' => $notificationSerialized->getNotification(),
        ];

        $this->assertExpressionLanguageExpressions(
            $expectations['assertions'],
            $values
        );
    }
}
