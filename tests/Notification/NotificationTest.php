<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Notification;

use OpenEuropa\EPoetry\Serializer\Serializer;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use Phpro\SoapClient\Soap\HttpBinding\SoapResponse;

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

    /**
     * Test parsing a SOAP notification.
     *
     * @param string $notification
     * @param mixed $expectations
     *
     * @dataProvider responseParsingCases
     *
     * @group teste
     */
    public function testResponseParsing(string $notification, $expectations): void
    {
        $notificationXml = $this->getFixtureContent($notification);
        $response = new SoapResponse($notificationXml);

        $driver = $this->createClientFactory()
            ->setNotificationData()
            ->buildDriver();

        $parsed = $driver->decode('receiveNotification', $response);

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
