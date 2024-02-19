<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Notification;

use EcPhp\CasLib\Cas;
use EcPhp\CasLib\Configuration\Properties;
use EcPhp\CasLib\Contract\CasInterface;
use EcPhp\CasLib\Response\CasResponseBuilder;
use EcPhp\CasLib\Response\Factory\AuthenticationFailureFactory;
use EcPhp\CasLib\Response\Factory\ProxyFactory;
use EcPhp\CasLib\Response\Factory\ProxyFailureFactory;
use EcPhp\CasLib\Response\Factory\ServiceValidateFactory;
use EcPhp\Ecas\Ecas;
use EcPhp\Ecas\EcasProperties;
use EcPhp\Ecas\Response\EcasResponseBuilder;
use EcPhp\Ecas\Service\Fingerprint\DefaultFingerprint;
use Exception;
use GuzzleHttp\Psr7\ServerRequest;
use loophp\psr17\Psr17;
use Nyholm\Psr7\Factory\Psr17Factory;
use OpenEuropa\EPoetry\Notification\Exception\NotificationValidationException;
use OpenEuropa\EPoetry\TicketValidation\ECas\ECasTicketValidation;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Psr18Client;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class ReceiveNotificationWithECasTest extends BaseNotificationTest
{
    /**
     * @dataProvider dataProviderValidateRequest
     */
    public function testValidateRequestWithTicket(
        string $jobAccount,
        string $body,
        string $exception,
        bool $expected
    ): void {
        $validation = new ECasTicketValidation($jobAccount, $this->getCas());
        $request = new ServerRequest('POST', 'http://foo', [], $body);

        if ('' !== $exception) {
            $this->expectException(NotificationValidationException::class);
            $this->expectExceptionMessage($exception);
        }

        $this::assertEquals($expected, $validation->validate($request));
    }

    public function dataProviderValidateRequest(): \Generator
    {
        yield 'Empty headers' => [
            'jobAccount' => 'jobAccount',
            'body' => '',
            'exception' => 'EU Login ticket validation failed due to the following error: DOMDocument::loadXML(): Argument #1 ($source) must not be empty',
            'expected' => false,
        ];
        yield 'Empty body' => [
            'jobAccount' => 'jobAccount',
            'body' => '',
            'exception' => 'EU Login ticket validation failed due to the following error: DOMDocument::loadXML(): Argument #1 ($source) must not be empty',
            'expected' => false,
        ];
        yield 'Invalid body format ' => [
            'jobAccount' => 'jobAccount',
            'body' => '{"foo": "bar"}',
            'exception' => "EU Login ticket validation failed due to the following error: Could not load the DOM Document
[FATAL] : Start tag expected, '<' not found
 (4) on line 1,1",
            'expected' => false,
        ];
        yield 'ProxyTicket not found' => [
            'jobAccount' => 'jobAccount',
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
            'exception' => 'EU Login ticket validation failed due to the following error: Request body element <ProxyTicket/> not found.',
            'expected' => false,
        ];
        yield 'ProxyTicket empty' => [
            'jobAccount' => 'jobAccount',
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
            'exception' => 'EU Login ticket validation failed due to the following error: Request body element <ProxyTicket/> found, but empty.',
            'expected' => false,
        ];
        yield 'Valid CAS ticket' => [
            'jobAccount' => 'jobAccount',
            'body' => '<?xml version="1.0" encoding="UTF-8"?>
                        <S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
                            <env:Header>
                                <ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">VALIDTICKET</ecas:ProxyTicket>
                            </env:Header>
                            <S:Body>
                                <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
                                    <notification></notification>
                                </ns0:receiveNotification>
                            </S:Body>
                        </S:Envelope>',
            'exception' => '',
            'expected' => true,
        ];
        yield 'Valid CAS ticket with account mismatch' => [
            'jobAccount' => 'foobar',
            'body' => '<?xml version="1.0" encoding="UTF-8"?>
                        <S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
                            <env:Header>
                                <ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">VALIDTICKET-WRONG-USERNAME</ecas:ProxyTicket>
                            </env:Header>
                            <S:Body>
                                <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
                                    <notification></notification>
                                </ns0:receiveNotification>
                            </S:Body>
                        </S:Envelope>',
            'exception' => 'EU Login ticket account mismatched: foobar was expected, while username was returned.',
            'expected' => false,
        ];
        yield 'Invalid CAS ticket' => [
            'jobAccount' => 'jobAccount',
            'body' => '<?xml version="1.0" encoding="UTF-8"?>
                        <S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
                            <env:Header>
                                <ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">INVALIDTICKET</ecas:ProxyTicket>
                            </env:Header>
                            <S:Body>
                                <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
                                    <notification></notification>
                                </ns0:receiveNotification>
                            </S:Body>
                        </S:Envelope>',
            'exception' => 'EU Login ticket validation failed with the following error: 0 CAS authentication failure',
            'expected' => false,
        ];
        yield 'Valid CAS ticket, but error 500' => [
            'jobAccount' => 'jobAccount',
            'body' => '<?xml version="1.0" encoding="UTF-8"?>
                        <S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
                            <env:Header>
                                <ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">VALIDTICKET-ERROR500</ecas:ProxyTicket>
                            </env:Header>
                            <S:Body>
                                <ns0:receiveNotification xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
                                    <notification></notification>
                                </ns0:receiveNotification>
                            </S:Body>
                        </S:Envelope>',
            'exception' => 'EU Login ticket validation failed with the following error: 0 Unable to a CAS response with response status code: 500.',
            'expected' => false,
        ];
    }

    private function getCas(): CasInterface
    {
        $ecasProperties = new EcasProperties(new Properties([
            'base_url' => 'http://local/cas',
            'protocol' => [
                'serviceValidate' => [
                    'path' => '/strictValidate',
                ],
            ],
        ]));

        $httpClient = new MockHttpClient(
            static function ($method, $url, $options): ResponseInterface {
                $info = match ($url) {
                    'http://local/cas/strictValidate?format=JSON&service=http%3A%2F%2Ffoo&ticket=VALIDTICKET-ERROR500' =>
                        [
                            'http_code' => 500,
                        ],
                        default =>
                        [
                            'response_headers' => [
                                'Content-Type' => 'application/json',
                            ],
                        ]
                };

                $body = match ($url) {
                    'http://local/cas/strictValidate?format=JSON&service=http%3A%2F%2Ffoo&ticket=VALIDTICKET-ERROR500' =>
                        '
                        {
                            "serviceResponse": {
                                "authenticationSuccess": {
                                    "user": "jobAccount"
                                }
                            }
                        }
                        ',
                    'http://local/cas/strictValidate?format=JSON&service=http%3A%2F%2Ffoo&ticket=VALIDTICKET' =>
                        '
                        {
                            "serviceResponse": {
                                "authenticationSuccess": {
                                    "user": "jobAccount"
                                }
                            }
                        }
                        ',
                    'http://local/cas/strictValidate?format=JSON&service=http%3A%2F%2Ffoo&ticket=VALIDTICKET-WRONG-USERNAME' =>
                        '
                        {
                            "serviceResponse": {
                                "authenticationSuccess": {
                                    "user": "username"
                                }
                            }
                        }
                        ',
                    'http://local/cas/strictValidate?format=JSON&service=http%3A%2F%2Ffoo&ticket=INVALIDTICKET' =>
                        '
                        {
                            "serviceResponse": {
                                "authenticationFailure": {
                                    "description": "The provided ticket is invalid."
                                }
                            }
                        }
                        ',
                    default => throw new Exception(sprintf('URL %s is not defined in the HTTP mock client.', $url))
                };

                return new MockResponse($body, $info);
            }
        );

        $psr17factory = new Psr17Factory;
        $psr17 = new Psr17($psr17factory, $psr17factory, $psr17factory, $psr17factory, $psr17factory, $psr17factory);

        $casResponseBuilder = new CasResponseBuilder(
            new AuthenticationFailureFactory(),
            new ProxyFactory(),
            new ProxyFailureFactory(),
            new ServiceValidateFactory()
        );

        $cas = new Cas(
            $ecasProperties,
            new Psr18Client($httpClient),
            $psr17,
            new ArrayAdapter,
            $casResponseBuilder
        );

        $ecasResponseBuilder = new EcasResponseBuilder(
            $casResponseBuilder
        );

        return new Ecas(
            $cas,
            $ecasProperties,
            $psr17,
            $ecasResponseBuilder,
            new Psr18Client($httpClient),
            new DefaultFingerprint
        );
    }
}
