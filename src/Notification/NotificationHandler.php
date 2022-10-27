<?php

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeOngoingEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeRequestedEvent;
use OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Notification handler passed to PHP's \SoapServer().
 */
class NotificationHandler {

    const NOTIFICATION_PRODUCT_STATUS_CHANGE = 'ProductStatusChange';
    const PRODUCT_STATUS_ONGOING = 'Ongoing';
    const PRODUCT_STATUS_REQUESTED = 'Requested';

    /**
     * Event dispatcher service.
     *
     * @var EventDispatcherInterface
     */
    protected EventDispatcherInterface $eventDispatcher;

    /**
     * Logger service.
     *
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * Serializer service.
     *
     * @var \Symfony\Component\Serializer\SerializerInterface
     */
    protected SerializerInterface $serializer;

    /**
     * Constructs NotificationHandler object.
     *
     * @param EventDispatcherInterface|null $eventDispatcher
     *   Event dispatcher service.
     * @param LoggerInterface|null $logger
     *   Logger service.
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, LoggerInterface $logger, SerializerInterface $serializer) {
        $this->eventDispatcher = $eventDispatcher;
        $this->logger = $logger;
        $this->serializer = $serializer;
    }

    /**
     * SOAP server handler method.
     *
     * @param \OpenEuropa\EPoetry\Notification\Type\ReceiveNotification $wrapper
     *
     * @return \OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse
     */
    public function receiveNotification(ReceiveNotification $wrapper): ReceiveNotificationResponse
    {
        $notification = $wrapper->getNotification();
        $type = $notification->getNotificationType();
        $this->logger->info('Handling ePoetry notification', [
            'type' => $type,
            'notification' => $this->serializer->toArray($notification),
        ]);

        $product = $notification->getProduct();
        $status = $product->getStatus();
        $event = null;

        // Create event for an ongoing status change request.
        if ($type === self::NOTIFICATION_PRODUCT_STATUS_CHANGE && $status === self::PRODUCT_STATUS_ONGOING) {
            $event = new StatusChangeOngoingEvent($product, $product->getAcceptedDeadline());
        }

        // Create event for a requested status change request.
        if ($type === self::NOTIFICATION_PRODUCT_STATUS_CHANGE && $status === self::PRODUCT_STATUS_REQUESTED) {
            $event = new StatusChangeRequestedEvent($notification->getProduct());
        }

        // @todo create following events:
        // DeliveryEvent
        // ChangeAcceptedEvent
        // ChangeRejectedEvent

        $this->eventDispatcher->dispatch($event::NAME, $event);

        $response = new ReceiveNotificationResponse();
        $response->setReturn((new DgtNotificationResult())->setSuccess(true));
        return $response;
    }

}
