<?php

namespace Notification;

namespace OpenEuropa\EPoetry\Tests\Notification;

use GuzzleHttp\Psr7\Request;
use OpenEuropa\EPoetry\Notification\Event as Notification;
use OpenEuropa\EPoetry\Notification\Exception\NotificationException;
use OpenEuropa\EPoetry\Notification\Type\Product;
use OpenEuropa\EPoetry\Notification\Type\ProductReference;
use OpenEuropa\EPoetry\Notification\Type\RequestReference;
use OpenEuropa\EPoetry\NotificationServerFactory;
use OpenEuropa\EPoetry\Tests\TicketValidation\NoopTicketValidation;
use Psr\Http\Message\RequestInterface;
use Psr\Log\Test\TestLogger;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Test SOAP notification handler.
 */
class NotificationHandlerTest extends BaseNotificationTest
{

    /**
     * Test product status changes notification events.
     *
     * @runInSeparateProcess
     * @dataProvider productStatusChangeEventsDataProvider
     */
    public function testProductStatusChangeEvents(string $class, string $status, string $message)
    {
        // Encapsulate assertions in an event subscriber.
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) use ($class, $status) {
            /** @var Notification\Product\BaseEvent $event */
            $this->assertInstanceOf($class, $event);
            $this->assertInstanceOf(Product::class, $event->getProduct());
            $this->assertEquals($status, $event->getProduct()->getStatus());
            $this->assertEquals(false, $event->getProduct()->hasFile());
            $this->assertEquals(false, $event->getProduct()->hasFormat());
            $this->assertEquals(false, $event->getProduct()->hasName());
            if ($event instanceof Notification\Product\ProductEventWithDeadlineInterface) {
                $this->assertEquals(null, $event->getAcceptedDeadline());
            }
            $this->assertInstanceOf(ProductReference::class, $event->getProduct()->getProductReference());
            $productReference = $event->getProduct()->getProductReference();
            $this->assertEquals('SK', $productReference->getLanguage());
            $this->assertInstanceOf(RequestReference::class, $productReference->getRequestReference());
            $this->assertEquals('AGRI-2022-93-(0)-0-TRA', $productReference->getRequestReference()->getReference());
            $event->setSuccessResponse('Success message.');
        }));

        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer, new NoopTicketValidation());
        $request = $this->getNotificationRequestByXml($message);
        $response = $server->handle($request);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals(<<<RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
RESPONSE, trim($response->getBody()->getContents()));
    }

    /**
     * Test data provider for product status change notifications.
     *
     * @return array
     */
    public function productStatusChangeEventsDataProvider(): array
    {
        $data = [];
        foreach ([
            'Accepted' => Notification\Product\StatusChangeAcceptedEvent::class,
            'Cancelled' => Notification\Product\StatusChangeCancelledEvent::class,
            'Closed' => Notification\Product\StatusChangeClosedEvent::class,
            'ReadyToBeSent' => Notification\Product\StatusChangeReadyToBeSentEvent::class,
            'Requested' => Notification\Product\StatusChangeRequestedEvent::class,
            'Sent' => Notification\Product\StatusChangeSentEvent::class,
            'Suspended' => Notification\Product\StatusChangeSuspendedEvent::class,
            'Ongoing' => Notification\Product\StatusChangeOngoingEvent::class,
        ] as $status => $class) {
            $data[] = [
                'class' => $class,
                'status' => $status,
                'message' => sprintf(<<<MESSAGE
<?xml version='1.0' encoding='UTF-8'?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:eu="http://eu.europa.ec.dgt.epoetry">
    <soapenv:Header><ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">abc</ecas:ProxyTicket></soapenv:Header>
    <S:Body xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
        <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
            <notification>
                <notificationType>ProductStatusChange</notificationType>
                <product>
                    <productReference>
                        <requestReference>
                            <requesterCode>AGRI</requesterCode>
                            <year>2022</year>
                            <number>93</number>
                            <part>0</part>
                            <version>0</version>
                            <productType>TRA</productType>
                        </requestReference>
                        <language>SK</language>
                    </productReference>
                    <status>%s</status>
                </product>
            </notification>
        </ns0:receiveNotification>
    </S:Body>
</soapenv:Envelope>
MESSAGE, $status),
            ];
        }

        return $data;
    }

    /**
     * Test product status changes notification events.
     *
     * @runInSeparateProcess
     * @dataProvider productStatusChangeEventsWithDeadlineDataProvider
     */
    public function testProductStatusChangeEventsWithDeadline(string $class, string $status, string $message)
    {
        // Encapsulate assertions in an event subscriber.
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) use ($class, $status) {
            /** @var Notification\Product\BaseEventWithDeadline $event */
            $this->assertInstanceOf($class, $event);
            $this->assertInstanceOf(Product::class, $event->getProduct());
            $this->assertEquals($status, $event->getProduct()->getStatus());
            $this->assertInstanceOf(\DateTimeInterface::class, $event->getAcceptedDeadline());
            $this->assertEquals('Mon, 04 Apr 22 10:51:00 +0000', $event->getAcceptedDeadline()->format(\DATE_RFC822));
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

        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer, new NoopTicketValidation());
        $request = $this->getNotificationRequestByXml($message);
        $response = $server->handle($request);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals(<<<RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
RESPONSE, trim($response->getBody()->getContents()));
    }

    /**
     * Test data provider for product status change notifications.
     *
     * @return array
     */
    public function productStatusChangeEventsWithDeadlineDataProvider(): array
    {
        $data = [];
        foreach ([
            'Accepted' => Notification\Product\StatusChangeAcceptedEvent::class,
            'ReadyToBeSent' => Notification\Product\StatusChangeReadyToBeSentEvent::class,
            'Suspended' => Notification\Product\StatusChangeSuspendedEvent::class,
            'Ongoing' => Notification\Product\StatusChangeOngoingEvent::class,
        ] as $status => $class) {
            $data[] = [
                'class' => $class,
                'status' => $status,
                'message' => sprintf(<<<MESSAGE
<?xml version='1.0' encoding='UTF-8'?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:eu="http://eu.europa.ec.dgt.epoetry">
    <soapenv:Header><ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">abc</ecas:ProxyTicket></soapenv:Header>
    <S:Body xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
        <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
            <notification>
                <notificationType>ProductStatusChange</notificationType>
                <product>
                    <productReference>
                        <requestReference>
                            <requesterCode>AGRI</requesterCode>
                            <year>2022</year>
                            <number>93</number>
                            <part>0</part>
                            <version>0</version>
                            <productType>TRA</productType>
                        </requestReference>
                        <language>SK</language>
                    </productReference>
                    <status>%s</status>
                    <acceptedDeadline>2022-04-04T12:51:00.000+02:00</acceptedDeadline>
                </product>
            </notification>
        </ns0:receiveNotification>
    </S:Body>
</soapenv:Envelope>
MESSAGE, $status),
            ];
        }

        return $data;
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

        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer, new NoopTicketValidation());
        $request = $this->getNotificationRequest('productDeliverySent.xml');
        $response = $server->handle($request);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals(<<<RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
RESPONSE, trim($response->getBody()->getContents()));
    }

    /**
     * Test request status changes notification events.
     *
     * @runInSeparateProcess
     * @dataProvider requestStatusChangeEventsDataProvider
     */
    public function testRequestStatusChangeEvents(string $class, string $status, string $message)
    {
        // Encapsulate assertions in an event subscriber.
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) use ($class, $status) {
            /** @var Notification\Request\BaseEvent $event */
            $this->assertInstanceOf($class, $event);
            $this->assertEquals('DGT.S.S-1.P-2', $event->getPlanningSector());
            $this->assertEquals('Notification message', $event->getMessage());
            $this->assertEquals('foobar', $event->getPlanningAgent());
            $this->assertEquals($status, $event->getLinguisticRequest()->getStatus());
            $this->assertEquals('AGRI-2022-83-(0)-0-TRA', $event->getLinguisticRequest()->getRequestReference()->getReference());
            $event->setSuccessResponse('Success message.');
        }));

        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer, new NoopTicketValidation());
        $request = $this->getNotificationRequestByXml($message);
        $response = $server->handle($request);

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals(<<<RESPONSE
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
RESPONSE, trim($response->getBody()->getContents()));
    }

    /**
     * Test data provider for request status change notifications.
     *
     * @return array
     */
    public function requestStatusChangeEventsDataProvider(): array
    {
        $data = [];
        foreach ([
            'Accepted' => Notification\Request\StatusChangeAcceptedEvent::class,
            'Cancelled' => Notification\Request\StatusChangeCancelledEvent::class,
            'Executed' => Notification\Request\StatusChangeExecutedEvent::class,
            'Rejected' => Notification\Request\StatusChangeRejectedEvent::class,
            'Suspended' => Notification\Request\StatusChangeSuspendedEvent::class,
        ] as $status => $class) {
            $data[] = [
                'class' => $class,
                'status' => $status,
                'message' => sprintf(<<<MESSAGE
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:eu="http://eu.europa.ec.dgt.epoetry">
    <soapenv:Header><ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">abc</ecas:ProxyTicket></soapenv:Header>
    <S:Body xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
        <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
            <notification>
                <notificationType>RequestStatusChange</notificationType>
                <linguisticRequest>
                    <requestReference>
                        <requesterCode>AGRI</requesterCode>
                        <year>2022</year>
                        <number>83</number>
                        <part>0</part>
                        <version>0</version>
                        <productType>TRA</productType>
                    </requestReference>
                    <status>%s</status>
                </linguisticRequest>
                <message>Notification message</message>
                <planningAgent>foobar</planningAgent>
                <planningSector>DGT.S.S-1.P-2</planningSector>
            </notification>
        </ns0:receiveNotification>
    </S:Body>
</soapenv:Envelope>
MESSAGE, $status),
            ];
        }

        return $data;
    }

    /**
     * @runInSeparateProcess
     */
    public function testNotificationHandlerError(): void
    {
        $this->expectException(NotificationException::class);
        $this->expectExceptionMessage("The ePoetry notification event 'epoetry.notification.request_status.change_accepted' was not handled correctly. Make sure to set a response when handling the event.");

        // We don't set up any even handler, so to trigger the error above.
        $eventDispatcher = new EventDispatcher();
        $server = new NotificationServerFactory('', $eventDispatcher, $this->logger, $this->serializer, new NoopTicketValidation());
        $request = $this->getNotificationRequestByXml(<<<MESSAGE
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:eu="http://eu.europa.ec.dgt.epoetry">
    <soapenv:Header><ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">abc</ecas:ProxyTicket></soapenv:Header>
    <S:Body xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
        <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
            <notification>
                <notificationType>RequestStatusChange</notificationType>
                <linguisticRequest>
                    <requestReference>
                        <requesterCode>AGRI</requesterCode>
                        <year>2022</year>
                        <number>83</number>
                        <part>0</part>
                        <version>0</version>
                        <productType>TRA</productType>
                    </requestReference>
                    <status>Accepted</status>
                </linguisticRequest>
                <message>Notification message</message>
                <planningAgent>foobar</planningAgent>
                <planningSector>DGT.S.S-1.P-2</planningSector>
            </notification>
        </ns0:receiveNotification>
    </S:Body>
</soapenv:Envelope>
MESSAGE);
        $server->handle($request);
    }

    /**
     * @runInSeparateProcess
     */
    public function testNotificationLogging()
    {
        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($this->getSubscriber(function (Event $event) {
            // We need to handle the event, or else an exception will be thrown.
            $event->setSuccessResponse('Success message.');
        }));

        $logger = new TestLogger();
        $server = new NotificationServerFactory('', $eventDispatcher, $logger, $this->serializer, new NoopTicketValidation());
        $request = $this->getNotificationRequest('productDeliverySent.xml');
        $server->handle($request);

        $this->assertEquals(
            [
                'level' => 'info',
                'message' => "Received notification:\n{request}",
                'context' =>
                    [
                        'request' => 'POST / HTTP/1.1
Host: foo
accept: text/xml
content-type: text/xml; charset=utf-8
SOAPAction: http://eu.europa.ec.dgt.epoetry/DgtClientNotificationReceiverWS/receiveNotificationRequest

<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:eu="http://eu.europa.ec.dgt.epoetry">
    <soapenv:Header><ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">abc</ecas:ProxyTicket></soapenv:Header>
    <S:Body xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
        <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
            <notification>
                <notificationType>ProductDelivery</notificationType>
                <product>
                    <productReference>
                        <requestReference>
                            <requesterCode>SG</requesterCode>
                            <year>2022</year>
                            <number>343</number>
                            <part>0</part>
                            <version>1</version>
                            <productType>TRA</productType>
                        </requestReference>
                        <language>FR</language>
                    </productReference>
                    <status>Sent</status>
                    <acceptedDeadline>2022-09-01T12:51:00.000+02:00</acceptedDeadline>
                    <file>RmlsZSBjb250ZW50Lg==</file>
                    <name>SG-2022-00343(01)-00-TRA-FR</name>
                    <format>DOCX</format>
                </product>
                <planningSector>DGT.D.FR.FR-1</planningSector>
            </notification>
        </ns0:receiveNotification>
    </S:Body>
</soapenv:Envelope>
',
                    ],
            ],
            $logger->records[0]
        );
        $this->assertEquals(
            [
                'level' => 'info',
                'message' => 'Handling ePoetry notification "{type}": {notification}',
                'context' =>
                    [
                        'type' => 'ProductDelivery',
                        'notification' => '<?xml version="1.0"?>
<response><notificationType>ProductDelivery</notificationType><product><productReference><requestReference><requesterCode>SG</requesterCode><year>2022</year><number>343</number><part>0</part><version>1</version><productType>TRA</productType><reference>SG-2022-343-(1)-0-TRA</reference></requestReference><language>FR</language></productReference><status>Sent</status><acceptedDeadline>2022-09-01T10:51:00+00:00</acceptedDeadline><file>File content.</file><name>SG-2022-00343(01)-00-TRA-FR</name><format>DOCX</format></product><planningSector>DGT.D.FR.FR-1</planningSector></response>
',
                    ],
            ],
            $logger->records[1]
        );
        $this->assertEquals(
            [
                'level' => 'info',
                'message' => 'Dispatching ePoetry notification event "{event}"',
                'context' =>
                    [
                        'event' => 'epoetry.notification.product_delivery',
                    ],
            ],
            $logger->records[2]
        );
        $this->assertEquals(
            [
                'level' => 'info',
                'message' => "Returned response:\n{response}",
                'context' =>
                    [
                        'response' => 'HTTP/1.1 200 OK
content-type: text/xml

<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><SOAP-ENV:Body><ns1:receiveNotificationResponse><return><success>true</success><message>Success message.</message></return></ns1:receiveNotificationResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
',
                    ],
            ],
            $logger->records[3]
        );
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
        return $this->getNotificationRequestByXml($xml);
    }

    /**
     * Get a HTTP request object having given XML as body.
     *
     * @param string $xml
     *   String containing actual request XML.
     *
     * @return \Psr\Http\Message\RequestInterface
     *   HTTP request object.
     */
    private function getNotificationRequestByXml(string $xml): RequestInterface
    {
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
                    // Product notifications.
                    Notification\Product\StatusChangeAcceptedEvent::NAME => 'doAssert',
                    Notification\Product\StatusChangeCancelledEvent::NAME => 'doAssert',
                    Notification\Product\StatusChangeClosedEvent::NAME => 'doAssert',
                    Notification\Product\StatusChangeOngoingEvent::NAME => 'doAssert',
                    Notification\Product\StatusChangeReadyToBeSentEvent::NAME => 'doAssert',
                    Notification\Product\StatusChangeRequestedEvent::NAME => 'doAssert',
                    Notification\Product\StatusChangeSentEvent::NAME => 'doAssert',
                    Notification\Product\StatusChangeSuspendedEvent::NAME => 'doAssert',
                    Notification\Product\DeliveryEvent::NAME => 'doAssert',
                    // Request notifications.
                    Notification\Request\StatusChangeAcceptedEvent::NAME => 'doAssert',
                    Notification\Request\StatusChangeCancelledEvent::NAME => 'doAssert',
                    Notification\Request\StatusChangeExecutedEvent::NAME => 'doAssert',
                    Notification\Request\StatusChangeRejectedEvent::NAME => 'doAssert',
                    Notification\Request\StatusChangeSuspendedEvent::NAME => 'doAssert',
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
