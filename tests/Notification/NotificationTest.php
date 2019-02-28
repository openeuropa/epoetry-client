<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Notification;

use OpenEuropa\EPoetry\Serializer\NotificationSerializer;
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
     * Test parsing a SOAP notification.
     *
     * @param string $notification
     * @param mixed $expectations
     *
     * @dataProvider responseParsingCases
     */
    public function testResponseParsing(string $notification, $expectations): void
    {
        $notificationXml = $this->getFixtureContent($notification);
        $notificationSerialized = NotificationSerializer::fromString(
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
