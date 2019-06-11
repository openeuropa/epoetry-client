<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;

/**
 * @internal
 * @coversNothing
 */
final class NotificationServerHandlerTest extends AbstractTest
{
    /**
     * @runInSeparateProcess
     */
    public function testNotificationServer()
    {
        $client = $this->createClientFactory();
        $server = $client->getSoapServer();
        $request = $this->getFixtureContent(self::FIXTURE_DIR . '/Notification/notification-status-change-full.xml');

        $response = $server->handle($request);
        static::assertContains('<ns1:receiveNotificationResponse/>', $response);

        $debug = $server->getHandler()->debugLastServerCall();
        $receiveNotification = $debug['receiveNotification'][0];
        static::assertInstanceOf(ReceiveNotification::class, $receiveNotification);

        static::assertEquals('ONG', $receiveNotification->getNotification()->getNewStatus());
    }
}
