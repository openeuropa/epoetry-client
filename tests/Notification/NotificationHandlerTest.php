<?php

namespace Notification;

use GuzzleHttp\Psr7\Request;
use Monolog\Logger;
use OpenEuropa\EPoetry\Notification\Event as Notification;
use OpenEuropa\EPoetry\Notification\Exception\NotificationException;
use OpenEuropa\EPoetry\Notification\Type\Product;
use OpenEuropa\EPoetry\Notification\Type\ProductReference;
use OpenEuropa\EPoetry\Notification\Type\RequestReference;
use OpenEuropa\EPoetry\NotificationServerFactory;
use OpenEuropa\EPoetry\Serializer\Serializer;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
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

    /**
     * @runInSeparateProcess
     */
    public function testStatusChangeOngoingEvent()
    {
        // Encapsulate assertions in an event subscriber.
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) {
            $this->assertInstanceOf(Notification\Product\StatusChangeOngoingEvent::class, $event);
            $this->assertInstanceOf(Product::class, $event->getProduct());
            $this->assertInstanceOf(\DateTimeInterface::class, $event->getAcceptedDeadline());
            $this->assertEquals('Mon, 04 Apr 22 10:51:00 +0000', $event->getAcceptedDeadline()->format(\DATE_RFC822));
            $this->assertEquals('Ongoing', $event->getProduct()->getStatus());
            $this->assertEquals(false, $event->getProduct()->hasFile());
            $this->assertEquals(false, $event->getProduct()->hasFormat());
            $this->assertEquals(false, $event->getProduct()->hasName());
            $this->assertInstanceOf(ProductReference::class, $event->getProduct()->getProductReference());
            $productReference = $event->getProduct()->getProductReference();
            $this->assertEquals('CS', $productReference->getLanguage());
            $this->assertInstanceOf(RequestReference::class, $productReference->getRequestReference());
            $this->assertEquals('AGRI-2022-81-(1)-0-TRA', $productReference->getRequestReference()->getReference());
            $event->setSuccessResponse('Success message.');
        }));

        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer);
        $request = $this->getNotificationRequest('productStatusChangeOngoing.xml');
        $response = $server->handle($request);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals(<<<RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
RESPONSE, trim($response->getBody()->getContents()));
    }

    /**
     * @runInSeparateProcess
     */
    public function testStatusChangeRequestedEvent()
    {
        // Encapsulate assertions in an event subscriber.
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) {
            $this->assertInstanceOf(Notification\Product\StatusChangeRequestedEvent::class, $event);
            $this->assertInstanceOf(Product::class, $event->getProduct());
            $this->assertEquals('Requested', $event->getProduct()->getStatus());
            $this->assertEquals(false, $event->getProduct()->hasFile());
            $this->assertEquals(false, $event->getProduct()->hasFormat());
            $this->assertEquals(false, $event->getProduct()->hasName());
            $this->assertInstanceOf(ProductReference::class, $event->getProduct()->getProductReference());
            $productReference = $event->getProduct()->getProductReference();
            $this->assertEquals('SK', $productReference->getLanguage());
            $this->assertInstanceOf(RequestReference::class, $productReference->getRequestReference());
            $this->assertEquals('AGRI-2022-93-(0)-0-TRA', $productReference->getRequestReference()->getReference());
            $event->setSuccessResponse('Success message.');
        }));

        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer);
        $request = $this->getNotificationRequest('productStatusChangeRequested.xml');
        $response = $server->handle($request);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals(<<<RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
RESPONSE, trim($response->getBody()->getContents()));
    }

    /**
     * @runInSeparateProcess
     */
    public function testDeliveryEvent()
    {
        // Encapsulate assertions in an event subscriber.
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) {
            $this->assertInstanceOf(Notification\Product\DeliveryEvent::class, $event);
            $this->assertInstanceOf(Product::class, $event->getProduct());
            $this->assertEquals('Sent', $event->getProduct()->getStatus());
            $this->assertEquals(true, $event->getProduct()->hasFile());
            $this->assertEquals(true, $event->getProduct()->hasFormat());
            $this->assertEquals(true, $event->getProduct()->hasName());
            $this->assertInstanceOf(ProductReference::class, $event->getProduct()->getProductReference());
            $productReference = $event->getProduct()->getProductReference();
            $this->assertEquals('FR', $productReference->getLanguage());
            $this->assertInstanceOf(RequestReference::class, $productReference->getRequestReference());
            $this->assertEquals('SG-2022-343-(1)-0-TRA', $productReference->getRequestReference()->getReference());
            $this->assertEquals('File content.', $event->getDeliveryContent());
            $event->setSuccessResponse('Success message.');
        }));

        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer);
        $request = $this->getNotificationRequest('productDeliverySent.xml');
        $response = $server->handle($request);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals(<<<RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
RESPONSE, trim($response->getBody()->getContents()));
    }

    /**
     * @runInSeparateProcess
     */
    public function testChangeAcceptedEvent()
    {
        // Encapsulate assertions in an event subscriber.
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) {
            $this->assertInstanceOf(Notification\Request\StatusChangeAcceptedEvent::class, $event);
            $this->assertEquals('DGT.S.S-1.P-1', $event->getPlanningSector());
            $this->assertEquals('teodomi', $event->getPlanningAgent());
            $this->assertEquals('Accepted', $event->getLinguisticRequest()->getStatus());
            $this->assertEquals('SG-2022-127-(0)-0-TRA', $event->getLinguisticRequest()->getRequestReference()->getReference());
            $event->setSuccessResponse('Success message.');
        }));

        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer);
        $request = $this->getNotificationRequest('requestStatusChangeAccepted.xml');
        $response = $server->handle($request);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals(<<<RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
RESPONSE, trim($response->getBody()->getContents()));
    }

    /**
     * @runInSeparateProcess
     */
    public function testChangeRejectedEvent()
    {
        // Encapsulate assertions in an event subscriber.
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) {
            $this->assertInstanceOf(Notification\Request\StatusChangeRejectedEvent::class, $event);
            $this->assertEquals('DGT.S.S-1.P-2', $event->getPlanningSector());
            $this->assertEquals('collafc', $event->getPlanningAgent());
            $this->assertEquals('Rejected', $event->getLinguisticRequest()->getStatus());
            $this->assertEquals('AGRI-2022-83-(0)-0-TRA', $event->getLinguisticRequest()->getRequestReference()->getReference());
            $event->setSuccessResponse('Success message.');
        }));

        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer);
        $request = $this->getNotificationRequest('requestStatusChangeRejected.xml');
        $response = $server->handle($request);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals(<<<RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
RESPONSE, trim($response->getBody()->getContents()));
    }

    /**
     * @runInSeparateProcess
     */
    public function testNotificationHandlerError(): void
    {
        $this->expectException(NotificationException::class);
        $this->expectExceptionMessage("The ePoetry notification event 'RequestStatusChange' was not handled correctly");

        $eventDispatcher = new EventDispatcher();
        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer);
        $request = $this->getNotificationRequest('requestStatusChangeRejected.xml');
        $server->handle($request);
    }

    /**
     * Get a HTTP request object having given fixture as body.
     *
     * @param string $fixtureName
     *   Fixture filename.
     *
     * @return \Psr\Http\Message\RequestInterface
     *   HTTP request object.
     */
    private function getNotificationRequest(string $fixtureName): RequestInterface
    {
        $xml = file_get_contents(__DIR__ . '/fixtures/' . $fixtureName);
        return new Request('POST', 'http://foo', [
            'accept' => 'text/xml',
            'content-type' => 'text/xml; charset=utf-8',
            'SOAPAction' => 'http://eu.europa.ec.dgt.epoetry/DgtClientNotificationReceiverWS/receiveNotificationRequest',
        ], $xml);
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
                    Notification\Product\StatusChangeOngoingEvent::NAME => 'doAssert',
                    Notification\Product\StatusChangeRequestedEvent::NAME => 'doAssert',
                    Notification\Product\DeliveryEvent::NAME => 'doAssert',
                    Notification\Request\StatusChangeAcceptedEvent::NAME => 'doAssert',
                    Notification\Request\StatusChangeRejectedEvent::NAME => 'doAssert',
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
