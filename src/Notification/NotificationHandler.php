<?php

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Notification\Event\Product as Product;
use OpenEuropa\EPoetry\Notification\Event\Request as Request;
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
                        $event = new Product\StatusChangeRequestedEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_ACCEPTED:
                        $event = new Product\StatusChangeAcceptedEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_ONGOING:
                        $event = new Product\StatusChangeOngoingEvent($product, $product->getAcceptedDeadline());
                        break;
                    case self::PRODUCT_STATUS_CHANGE_READY_TO_BE_SENT:
                        $event = new Product\StatusChangeReadyToBeSentEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_SENT:
                        $event = new Product\StatusChangeSentEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_CANCELLED:
                        $event = new Product\StatusChangeCancelledEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_CLOSED:
                        $event = new Product\StatusChangeClosedEvent($product);
                        break;
                    case self::PRODUCT_STATUS_CHANGE_SUSPENDED:
                        $event = new Product\StatusChangeSuspendedEvent($product);
                        break;
                }
                break;
            case self::NOTIFICATION_PRODUCT_DELIVERY:
                $event = new Product\DeliveryEvent($notification->getProduct());
                break;
            case self::NOTIFICATION_REQUEST_STATUS_CHANGE:
                $request = $notification->getLinguisticRequest();
                $message = $notification->getMessage() ?? '';
                switch ($request->getStatus()) {
                    case self::REQUEST_STATUS_CHANGE_ACCEPTED:
                        $event = new Request\StatusChangeAcceptedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector(), $message);
                        break;
                    case self::REQUEST_STATUS_CHANGE_CANCELLED:
                        $event = new Request\StatusChangeCancelledEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector(), $message);
                        break;
                    case self::REQUEST_STATUS_CHANGE_EXECUTED:
                        $event = new Request\StatusChangeExecutedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector(), $message);
                        break;
                    case self::REQUEST_STATUS_CHANGE_SUSPENDED:
                        $event = new Request\StatusChangeSuspendedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector(), $message);
                        break;
                    case self::REQUEST_STATUS_CHANGE_REJECTED:
                        $event = new Request\StatusChangeRejectedEvent($request, $notification->getPlanningAgent(), $notification->getPlanningSector(), $message);
                        break;
                }
                break;
        }

        $this->eventDispatcher->dispatch($event, $event::NAME);
        if (!$event->hasResponse()) {
            $error = sprintf("The ePoetry notification event '%s' was not handled correctly.", $event::NAME);
            $this->logger->error($error);
            throw new NotificationException($error);
        }
        return $event->getResponse();
    }
}
