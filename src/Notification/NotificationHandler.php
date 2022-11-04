<?php

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Notification\Event\Product\DeliveryEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeOngoingEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeRequestedEvent;
use OpenEuropa\EPoetry\Notification\Event\RequestStatus\ChangeAcceptedEvent;
use OpenEuropa\EPoetry\Notification\Event\RequestStatus\ChangeRejectedEvent;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Notification handler passed to PHP's \SoapServer().
 */
class NotificationHandler {

    const NOTIFICATION_PRODUCT_DELIVERY = 'ProductDelivery';
    const NOTIFICATION_PRODUCT_STATUS_CHANGE = 'ProductStatusChange';
    const PRODUCT_STATUS_ONGOING = 'Ongoing';
    const PRODUCT_STATUS_REQUESTED = 'Requested';

    const NOTIFICATION_REQUEST_STATUS_CHANGE = 'RequestStatusChange';
    const REQUEST_STATUS_ACCEPTED = 'Accepted';
    const REQUEST_STATUS_REJECTED = 'Rejected';

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

        $event = null;

        switch ($type) {
            case self::NOTIFICATION_PRODUCT_STATUS_CHANGE:
                $product = $notification->getProduct();
                if ($product->getStatus() === self::PRODUCT_STATUS_ONGOING) {
                    $event = new StatusChangeOngoingEvent($product, $product->getAcceptedDeadline());
                }
                if ($product->getStatus() === self::PRODUCT_STATUS_REQUESTED) {
                    $event = new StatusChangeRequestedEvent($notification->getProduct());
                }
                break;
            case self::NOTIFICATION_PRODUCT_DELIVERY:
                $event = new DeliveryEvent($notification->getProduct());
                break;
            case self::NOTIFICATION_REQUEST_STATUS_CHANGE:
                $request = $notification->getLinguisticRequest();
                if ($request->getStatus() === self::REQUEST_STATUS_ACCEPTED) {
                    $event = new ChangeAcceptedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector());
                }
                if ($request->getStatus() === self::REQUEST_STATUS_REJECTED) {
                    $event = new ChangeRejectedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector(), $notification->getMessage());
                }
                break;
        }

        $this->eventDispatcher->dispatch($event::NAME, $event);
        return $event->getResponse();
    }

}
