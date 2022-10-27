<?php

namespace Notification;

use Monolog\Logger;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeOngoingEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeRequestedEvent;
use OpenEuropa\EPoetry\Notification\NotificationHandler;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use OpenEuropa\EPoetry\Serializer\Serializer;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Test SOAP notification handler.
 */
class NotificationHandlerTest extends TestCase
{

    protected Serializer $serializer;

    protected LoggerInterface $logger;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = new Serializer();
        $this->logger = new Logger('test');
    }

    public function test()
    {
        // Encapsulate assertions in an event subscriber.
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) {
            $this->assertInstanceOf(StatusChangeOngoingEvent::class, $event);
        }));

        $handler = new NotificationHandler($eventDispatcher, $this->logger, $this->serializer);
        $notification = $this->getNotificationFixture('productStatusChangeOngoing.xml');
        $response = $handler->receiveNotification($notification);

        $this->assertTrue(true);
    }

    /**
     * Get a notification object by deserializing its XML representation.
     *
     * @param string $name
     *   Fixture filename.
     *
     * @return \OpenEuropa\EPoetry\Notification\Type\ReceiveNotification
     *   Deserialized object.
     */
    private function getNotificationFixture(string $name): ReceiveNotification
    {
        /** @var ReceiveNotification $object */
        $xml = file_get_contents(__DIR__ . '/fixtures/' . $name);
        $object = $this->serializer->deserialize($xml, 'OpenEuropa\EPoetry\Notification\Type\ReceiveNotification', 'xml');
        return $object;
    }

    /**
     * Build and get subscriber.
     *
     * @param callable $assert
     *
     * @return \Symfony\Component\EventDispatcher\EventSubscriberInterface
     */
    private function getSubscriber(callable $assert): EventSubscriberInterface
    {
        return new class($assert) implements EventSubscriberInterface {

            private $assert;

            /**
             * @param callable $assert
             */
            public function __construct(callable $assert)
            {
                $this->assert = $assert;
            }

            /**
             * @inheritDoc
             */
            public static function getSubscribedEvents()
            {
                return [
                    StatusChangeOngoingEvent::NAME => 'doAssert',
                    StatusChangeRequestedEvent::NAME => 'doAssert',
                ];
            }

            /**
             * @param \Symfony\Contracts\EventDispatcher\Event $event
             *
             * @return void
             */
            public function doAssert(Event $event): void
            {
                ($this->assert)($event);
            }
        };
    }
}
