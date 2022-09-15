<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use Consolidation\Log\Logger;
use Http\Adapter\Guzzle6\Client as GuzzleHttpClient;
use Http\Mock\Client as MockClient;
use OpenEuropa\EPoetry\NotificationClientFactory;
use Soap\ExtSoapEngine\AbusedClient;
use Soap\Psr18Transport\Psr18Transport;
use Soap\ExtSoapEngine\Transport\TraceableTransport;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Console\Output\BufferedOutput;

/**
 * Test NotificationClientFactory.
 */
final class NotificationClientFactoryTest extends BaseTest
{
    /**
     * Tests NotificationClientFactory constructor.
     */
    public function testConstructor(): void
    {
        $clientFactory = new NotificationClientFactory('http://foo.bar');
        $this->assertEquals('http://foo.bar', $clientFactory->getEndpoint());
        $this->assertEmpty($clientFactory->getProxyTicket());
        $this->assertInstanceOf(EventDispatcher::class, $clientFactory->getEventDispatcher());
        $this->assertEmpty($clientFactory->getLogger());
        $this->assertInstanceOf(GuzzleHttpClient::class, $clientFactory->getHttpClient());
        $this->assertInstanceOf(Psr18Transport::class, $clientFactory->getTransport());

        $clientFactory = new NotificationClientFactory('http://foo.bar', '[proxy ticket]', new EventDispatcher(), new Logger(new BufferedOutput()), new MockClient(), new TraceableTransport(new AbusedClient(__DIR__.'/../resources/request.wsdl'), Psr18Transport::createWithDefaultClient()));
        $this->assertEquals('[proxy ticket]', $clientFactory->getProxyTicket());
        $this->assertInstanceOf(EventDispatcher::class, $clientFactory->getEventDispatcher());
        $this->assertInstanceOf(Logger::class, $clientFactory->getLogger());
        $this->assertInstanceOf(MockClient::class, $clientFactory->getHttpClient());
        $this->assertInstanceOf(TraceableTransport::class, $clientFactory->getTransport());
    }
}
