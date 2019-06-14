<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use OpenEuropa\EPoetry\Tests\Notification\AbstractNotificationTest;

/**
 * @internal
 * @coversNothing
 */
final class NotificationServerHandlerTest extends AbstractNotificationTest
{
    /**
     * @runInSeparateProcess
     */
    public function testNotificationServer()
    {
        $client = $this->createServerFactory();
        $server = $client->getSoapServer();
        $request = $this->getFixtureContent('notification-status-change.xml');

        $response = $server->handle($request);
        static::assertContains('<ns1:receiveNotificationResponse/>', $response);

        $debug = $server->getHandler()->debugLastServerCall();
        $receiveNotification = $debug['receiveNotification'][0];
        static::assertInstanceOf(ReceiveNotification::class, $receiveNotification);

        static::assertEquals('ONG', $receiveNotification->getNotification()->getNewStatus());
    }
}
