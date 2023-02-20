<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use Consolidation\Log\Logger;
use Http\Mock\Client as MockClient;
use OpenEuropa\EPoetry\RequestClientFactory;
use Nyholm\Psr7\Response;
use OpenEuropa\EPoetry\Tests\Authentication\MockAuthentication;
use Soap\ExtSoapEngine\AbusedClient;
use Soap\Psr18Transport\Psr18Transport;
use Soap\ExtSoapEngine\Transport\TraceableTransport;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpClient\Psr18Client;

/**
 * Test RequestClientFactory.
 */
final class RequestClientFactoryTest extends BaseTest
{
    use Request\Traits\CreateLinguisticRequestTrait;

    public function testProxyTicket(): void
    {
        $expectedHeader = '<soap:Header xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws"><ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">[proxy ticket]</ecas:ProxyTicket></soap:Header>';
        $expectedBody = '<SOAP-ENV:Body><ns1:createLinguisticRequest><requestDetails><title>Request title</title>';

        $mockClient = new MockClient();
        $authentication = new MockAuthentication('[proxy ticket]');

        // Assert proxy token exists in the header.
        $mockClient->addResponse(new Response(200, [], $this->getCreateLinguisticRequestResponse()));
        $clientFactory = new RequestClientFactory('http://foo.bar', $authentication, null, null, $mockClient);
        $requestClient = $clientFactory->getRequestClient();

        $linguisticRequest = $this->getCreateLinguisticRequest();
        $requestClient->createLinguisticRequest($linguisticRequest);
        $body = (string) $mockClient->getLastRequest()->getBody();
        $this->assertStringContainsString($expectedBody, $body);
        $this->assertStringContainsString($expectedHeader, $body);
    }

    /**
     * Gets XML of createLinguisticRequestResponse.
     *
     * @return string
     *   XML data.
     */
    public function getCreateLinguisticRequestResponse(): string
    {
        return file_get_contents(__DIR__ . '/Request/fixtures/createLinguisticRequestResponse.xml');
    }

    /**
     * Tests RequestClientFactory constructor.
     */
    public function testConstructor(): void
    {
        $authentication = new MockAuthentication('');
        $clientFactory = new RequestClientFactory('http://foo.bar', $authentication);
        $this->assertEquals('http://foo.bar', $clientFactory->getEndpoint());
        $this->assertInstanceOf(EventDispatcher::class, $clientFactory->getEventDispatcher());
        $this->assertEmpty($clientFactory->getLogger());
        $this->assertInstanceOf(Psr18Client::class, $clientFactory->getHttpClient());
        $this->assertInstanceOf(Psr18Transport::class, $clientFactory->getTransport());

        $authentication = new MockAuthentication('[proxy ticket]');
        $clientFactory = new RequestClientFactory('http://foo.bar', $authentication, new EventDispatcher(), new Logger(new BufferedOutput()), new MockClient(), new TraceableTransport(new AbusedClient(__DIR__.'/../resources/request.wsdl'), Psr18Transport::createWithDefaultClient()));
        $this->assertInstanceOf(EventDispatcher::class, $clientFactory->getEventDispatcher());
        $this->assertInstanceOf(Logger::class, $clientFactory->getLogger());
        $this->assertInstanceOf(MockClient::class, $clientFactory->getHttpClient());
        $this->assertInstanceOf(TraceableTransport::class, $clientFactory->getTransport());
    }
}
