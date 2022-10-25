<?php

namespace OpenEuropa\EPoetry\Notification;

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
     * @param \OpenEuropa\EPoetry\Notification\Type\ReceiveNotification $notification
     *
     * @return \OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse
     */
    public function receiveNotification(ReceiveNotification $notification): ReceiveNotificationResponse
    {
        $this->logger->info('Handling SOAP request', ['notification' => $this->serializer->toArray($notification)]);
        $response = new ReceiveNotificationResponse();
        $response->setReturn((new DgtNotificationResult())->setSuccess(true));
        return $response;
    }

}
