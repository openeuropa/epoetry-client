<?php

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Notification\Event\Product\DeliveryEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeAcceptedEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeCancelledEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeClosedEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeOngoingEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeReadyToBeSentEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeSentEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeRequestedEvent;
use OpenEuropa\EPoetry\Notification\Event\Product\StatusChangeSuspendedEvent;
use OpenEuropa\EPoetry\Notification\Event\RequestStatus\ChangeAcceptedEvent;
use OpenEuropa\EPoetry\Notification\Event\RequestStatus\ChangeCancelledEvent;
use OpenEuropa\EPoetry\Notification\Event\RequestStatus\ChangeExecutedEvent;
use OpenEuropa\EPoetry\Notification\Event\RequestStatus\ChangeRejectedEvent;
use OpenEuropa\EPoetry\Notification\Event\RequestStatus\ChangeSuspendedEvent;
use OpenEuropa\EPoetry\Notification\Exception\NotificationException;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Notification handler passed to PHP's \SoapServer().
 */
class NotificationHandler
{

    const NOTIFICATION_PRODUCT_DELIVERY = 'ProductDelivery';
    const NOTIFICATION_PRODUCT_STATUS_CHANGE = 'ProductStatusChange';
    const PRODUCT_STATUS_CHANGE_REQUESTED = 'Requested';
    const PRODUCT_STATUS_CHANGE_ACCEPTED = 'Accepted';
    const PRODUCT_STATUS_CHANGE_ONGOING = 'Ongoing';
    const PRODUCT_STATUS_CHANGE_READY_TO_BE_SENT = 'ReadyToBeSent';
    const PRODUCT_STATUS_CHANGE_SENT = 'Sent';
    const PRODUCT_STATUS_CHANGE_CANCELLED = 'Cancelled';
    const PRODUCT_STATUS_CHANGE_CLOSED = 'Closed';
    const PRODUCT_STATUS_CHANGE_SUSPENDED = 'Suspended';

    const NOTIFICATION_REQUEST_STATUS_CHANGE = 'RequestStatusChange';
    const REQUEST_STATUS_CHANGE_ACCEPTED = 'Accepted';
    const REQUEST_STATUS_CHANGE_REJECTED = 'Rejected';
    const REQUEST_STATUS_CHANGE_CANCELLED = 'Cancelled';
    const REQUEST_STATUS_CHANGE_EXECUTED = 'Executed';
    const REQUEST_STATUS_CHANGE_SUSPENDED = 'Suspended';

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
     * @param EventDispatcherInterface $eventDispatcher
     *   Event dispatcher service.
     * @param LoggerInterface $logger
     *   Logger service.
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, LoggerInterface $logger, SerializerInterface $serializer)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->logger = $logger;
        $this->serializer = $serializer;
    }

    /**
     * SOAP server handler method.
     *
     * @SuppressWarnings(PHPMD)
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
                switch ($product->getStatus()) {
                    case self::PRODUCT_STATUS_CHANGE_REQUESTED:
                        $event = new StatusChangeRequestedEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_ACCEPTED:
                        $event = new StatusChangeAcceptedEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_ONGOING:
                        $event = new StatusChangeOngoingEvent($product, $product->getAcceptedDeadline());
                        break;
                    case self::PRODUCT_STATUS_CHANGE_READY_TO_BE_SENT:
                        $event = new StatusChangeReadyToBeSentEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_SENT:
                        $event = new StatusChangeSentEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_CANCELLED:
                        $event = new StatusChangeCancelledEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_CLOSED:
                        $event = new StatusChangeClosedEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_SUSPENDED:
                        $event = new StatusChangeSuspendedEvent($product);
                        break;
                }
                break;
            case self::NOTIFICATION_PRODUCT_DELIVERY:
                $event = new DeliveryEvent($notification->getProduct());
                break;
            case self::NOTIFICATION_REQUEST_STATUS_CHANGE:
                $request = $notification->getLinguisticRequest();
                switch ($request->getStatus()) {
                    case self::REQUEST_STATUS_CHANGE_ACCEPTED:
                        $event = new ChangeAcceptedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector());
                        break;
                    case self::REQUEST_STATUS_CHANGE_CANCELLED:
                        $event = new ChangeCancelledEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector());
                        break;
                    case self::REQUEST_STATUS_CHANGE_EXECUTED:
                        $event = new ChangeExecutedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector());
                        break;
                    case self::REQUEST_STATUS_CHANGE_SUSPENDED:
                        $event = new ChangeSuspendedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector());
                        break;
                    case self::REQUEST_STATUS_CHANGE_REJECTED:
                        $event = new ChangeRejectedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector(), $notification->getMessage());
                        break;
                }
                break;
        }

        $this->eventDispatcher->dispatch($event::NAME, $event);
        if (!$event->hasResponse()) {
            $error = "The ePoetry notification event '$type' has not been correctly handled.";
            $this->logger->error($error);
            throw new NotificationException($error);
        }
        return $event->getResponse();
    }
}
