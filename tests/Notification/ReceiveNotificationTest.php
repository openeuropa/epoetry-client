<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Monolog\Logger;
use Nyholm\Psr7\Factory\Psr17Factory;
use OpenEuropa\EPoetry\Notification\Exception\NotificationException;
use OpenEuropa\EPoetry\NotificationServerFactory;
use OpenEuropa\EPoetry\Tests\TicketValidation\NoopTicketValidation;
use OpenEuropa\EPoetry\TicketValidation\EuLogin\EuLoginTicketValidation;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Test ReceiveNotification.
 */
final class ReceiveNotificationTest extends BaseNotificationTest
{
    /**
     * Tests notification xml into object conversion.
     *
     * @dataProvider dataProviderReceiveNotification
     */
    public function testReceiveNotification($notification, $expectations): void
    {
        $object = $this->serializer->deserialize($notification, 'OpenEuropa\EPoetry\Notification\Type\ReceiveNotification', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['notification' => $object]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderReceiveNotification(): array
    {
        return $this->getFixture('receiveNotification.yaml', '/Notification');
    }

    /**
     * Test validation of RequestStatusChange notification.
     *
     * @dataProvider dataProviderValidation
     */
    public function testValidation($data, $expectations): void
    {
        $notification = $this->serializer->fromArray($data, 'OpenEuropa\EPoetry\Notification\Type\ReceiveNotification');
        $violations = $this->validator->validate($notification);
        $values = [
            'violations' => $violations,
        ];
        $this->assertExpressionLanguageExpressions($expectations['assertions'], $values);
    }

    /**
     * Test ticket extraction.
     *
     * @dataProvider extractTicketDataProvider
     */
    public function testExtractTicket(array $headers, string $body, string $exception): void
    {
        $validation = new EuLoginTicketValidation('', '', '', new Psr17Factory(), new Client(), new Logger('foo'));
        $this->expectException(NotificationException::class);

        $request = new Request('POST', 'http://foo', $headers, $body);
        $this->expectExceptionMessage($exception);
        $this->getMethod(EuLoginTicketValidation::class, 'extractTicket')->invoke($validation, $request);
    }

    /**
     * Data provider for testExtractTicket().
     *
     * @return array[]
     */
    public function extractTicketDataProvider(): array
    {
        return [
            [
                'headers' => [
                    'SOAPAction' => 'http://eu.europa.ec.dgt.epoetry/DgtClientNotificationReceiverWS/receiveNotificationRequest'
                ],
                'body' => '<?xml version="1.0" encoding="UTF-8"?>
                           <S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
                               <env:Header>
                               </env:Header>
                               <S:Body>
                                   <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
                                       <notification></notification>
                                   </ns0:receiveNotification>
                               </S:Body>
                           </S:Envelope>',
                'exception' => 'Request body element <ProxyTicket/> not found.',
            ],
            [
                'headers' => [
                    'SOAPAction' => 'http://eu.europa.ec.dgt.epoetry/DgtClientNotificationReceiverWS/receiveNotificationRequest'
                ],
                'body' => '<?xml version="1.0" encoding="UTF-8"?>
                           <S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
                               <S:Body>
                                   <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
                                       <notification></notification>
                                   </ns0:receiveNotification>
                               </S:Body>
                           </S:Envelope>',
                'exception' => 'Request body element <ProxyTicket/> not found.',
            ],
            [
                'headers' => [
                    'SOAPAction' => 'http://eu.europa.ec.dgt.epoetry/DgtClientNotificationReceiverWS/receiveNotificationRequest'
                ],
                'body' => '<?xml version="1.0" encoding="UTF-8"?>
                           <S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
                               <env:Header>
                                   <ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws"></ecas:ProxyTicket>
                               </env:Header>
                               <S:Body>
                                   <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
                                       <notification></notification>
                                   </ns0:receiveNotification>
                               </S:Body>
                           </S:Envelope>',
                'exception' => 'Request body element <ProxyTicket/> found, but empty.',
            ],
        ];
    }

    /**
     * Test validation of incoming notification requests.
     *
     * @dataProvider validateRequestDataProvider
     */
    public function testValidateRequest(array $headers, string $body, string $exception): void
    {
        $server = new NotificationServerFactory('', new EventDispatcher(), $this->logger, $this->serializer, new NoopTicketValidation());
        $this->expectException(NotificationException::class);

        $request = new Request('POST', 'http://foo', $headers, $body);
        $this->expectExceptionMessage($exception);
        $this->getMethod(NotificationServerFactory::class, 'validateRequest')->invoke($server, $request);
    }

    /**
     * Data provider for testValidateRequest().
     *
     * @return array[]
     */
    public function validateRequestDataProvider(): array
    {
        return [
            [
                'headers' => [],
                'body' => '',
                'exception' => 'Header "SOAPAction" is missing from notification request.',
            ],
            [
                'headers' => [
                    'SOAPAction' => 'http://eu.europa.ec.dgt.epoetry/DgtClientNotificationReceiverWS/receiveNotificationRequest'
                ],
                'body' => '',
                'exception' => 'Request body is not a valid XML.',
            ],
            [
                'headers' => [
                    'SOAPAction' => 'http://eu.europa.ec.dgt.epoetry/DgtClientNotificationReceiverWS/receiveNotificationRequest'
                ],
                'body' => '{"foo": "bar"}',
                'exception' => 'Request body is not a valid XML.',
            ],
        ];
    }


    /**
     * Data provider.
     *
     * The actual data is read from fixtures stored in a YAML configuration.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderValidation(): array
    {
        return $this->getFixture('receiveNotificationValidation.yaml', '/Notification')['tests'];
    }
}
