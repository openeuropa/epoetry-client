<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use Consolidation\Log\Logger;
use Http\Mock\Client as MockClient;
use OpenEuropa\EPoetry\RequestClientFactory;
use Nyholm\Psr7\Response;
use OpenEuropa\EPoetry\Tests\Authentication\MockAuthentication;
use ColinODell\PsrTestLogger\TestLogger;
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

    public function testRequestLogging(): void
    {
        $mockClient = new MockClient();
        $authentication = new MockAuthentication('12345');

        // Build client factory.
        $logger = new TestLogger();
        $mockClient->addResponse(new Response(200, [], $this->getCreateLinguisticRequestResponse()));
        $clientFactory = new RequestClientFactory('http://foo.bar', $authentication, null, $logger, $mockClient);
        $requestClient = $clientFactory->getRequestClient();

        $linguisticRequest = $this->getCreateLinguisticRequest();
        $requestClient->createLinguisticRequest($linguisticRequest);
        $mockClient->getLastRequest()->getBody();

        // Assert upstream library logging messages.
        $this->assertTrue($logger->hasInfoThatContains('[phpro/soap-client] request: call "createLinguisticRequest" with params OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest Object'));
        $this->assertTrue($logger->hasInfoThatContains('[phpro/soap-client] response: OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequestResponse Object'));

        // Assert ePoetry library logging messages.
        $this->assertEquals(
            [
                'level' => 'info',
                'message' => "Sending request:\n{formatted_request}",
                'context' =>
                    [
                        'formatted_request' => 'POST / HTTP/1.1
Host: foo.bar
SOAPAction: ""
Content-Type: text/xml; charset="utf-8"

<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry"><soap:Header xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws"><ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">12345</ecas:ProxyTicket></soap:Header><SOAP-ENV:Body><ns1:createLinguisticRequest><requestDetails><title>Request title</title><requestedDeadline>2121-07-06T11:51:00+01:00</requestedDeadline><sensitive>false</sensitive><destination>PUBLIC</destination><procedure>DEGHP</procedure><slaAnnex>ANNEX8A</slaAnnex><slaCommitment>2225555</slaCommitment><comment>comment</comment><accessibleTo>CONTACTS</accessibleTo><keyword1>keyword1</keyword1><keyword2>keyword2</keyword2><keyword3>keyword3</keyword3><contacts><contact userId="smithjo" contactRole="REQUESTER"/><contact userId="smithjo" contactRole="AUTHOR"/><contact userId="smithjo" contactRole="RECIPIENT"/></contacts><originalDocument><fileName>TEST_FILE_ORIGINALP.docx</fileName><comment/><content>Y2lkOjI2NzczNjgyODUzMQ==</content><linguisticSections/><trackChanges>false</trackChanges></originalDocument><products><product requestedDeadline="2121-07-06T11:51:00+01:00" trackChanges="false"><language>FR</language></product></products><auxiliaryDocuments><referenceDocuments><document><fileName>test.docx</fileName><language>EN</language><comment>test</comment><content>Y2lkOjMwMzYwNTgyNDExMg==</content></document></referenceDocuments><srcDocument><fileName>test2222SRC.docx</fileName><comment>777888877</comment><content>Y2lkOjE1MzE4ODQ3MDQyMjY=</content></srcDocument></auxiliaryDocuments></requestDetails><applicationName>appname</applicationName><templateName>DEFAULT</templateName></ns1:createLinguisticRequest></SOAP-ENV:Body></SOAP-ENV:Envelope>
',
                    ],
            ],
            $logger->records[1]
        );

        $this->assertEquals(
            [
                'level' => 'info',
                'message' => "Received response:\n{formatted_response}",
                'context' =>
                    [
                        'formatted_response' => 'HTTP/1.1 200 OK

<S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
    <env:Header/>
    <S:Body>
        <ns0:createLinguisticRequestResponse xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
            <return>
                <requestReference>
                    <dossier>
                        <requesterCode>DGT</requesterCode>
                        <number>487</number>
                        <year>2021</year>
                    </dossier>
                    <productType>TRA</productType>
                    <part>0</part>
                    <version>0</version>
                </requestReference>
                <requestDetails>
                    <title>test for DOC - success</title>
                    <internalReference/>
                    <requestedDeadline>2022-07-01T12:51:00+02:00</requestedDeadline>
                    <sensitive>false</sensitive>
                    <sentViaRue>false</sentViaRue>
                    <documentToAdopt>false</documentToAdopt>
                    <destination>PUBLIC</destination>
                    <procedure>DEGHP</procedure>
                    <slaAnnex>ANNEX8A</slaAnnex>
                    <comment>my request</comment>
                    <accessibleTo>CONTACTS</accessibleTo>
                    <keyword1>keyw1</keyword1>
                    <keyword2>key2</keyword2>
                    <keyword3>aaaaaaaaaaaaaaa</keyword3>
                    <status>SenttoDGT</status>
                    <applicationName>application1</applicationName>
                    <contacts>
                        <contact>
                            <firstName>John</firstName>
                            <lastName>SMITH</lastName>
                            <email>John.SMITH@ec.europa.eu</email>
                            <userId>smithjo</userId>
                            <roleCode>AUTHOR</roleCode>
                        </contact>
                        <contact>
                            <firstName>John</firstName>
                            <lastName>SMITH</lastName>
                            <email>John.SMITH@ec.europa.eu</email>
                            <userId>smithjo</userId>
                            <roleCode>RECIPIENT</roleCode>
                        </contact>
                        <contact>
                            <firstName>John</firstName>
                            <lastName>SMITH</lastName>
                            <email>John.SMITH@ec.europa.eu</email>
                            <userId>smithjo</userId>
                            <roleCode>REQUESTER</roleCode>
                        </contact>
                    </contacts>
                    <originalDocument>
                        <trackChanges>false</trackChanges>
                        <format>DOCX</format>
                        <fileName>TEST_FILE_ORIGINALP.docx</fileName>
                        <pages>0.0</pages>
                        <linguisticSections>
                            <linguisticSection>
                                <language>EN</language>
                            </linguisticSection>
                        </linguisticSections>
                    </originalDocument>
                    <products>
                        <product>
                            <language>FR</language>
                            <requestedDeadline>2021-07-06T12:51:00+02:00</requestedDeadline>
                            <trackChanges>false</trackChanges>
                            <status>SenttoDGT</status>
                            <format>DOCX</format>
                        </product>
                    </products>
                    <auxiliaryDocuments>
                        <document>
                            <fileName>test.docx</fileName>
                            <language>EN</language>
                            <documentType>REF</documentType>
                            <comment>test</comment>
                            <format>DOCX</format>
                        </document>
                        <document>
                            <fileName>test2222SRC.docx</fileName>
                            <language>EN</language>
                            <documentType>SRC</documentType>
                            <comment>srcFile</comment>
                            <format>DOCX</format>
                        </document>
                    </auxiliaryDocuments>
                </requestDetails>
                <informativeMessages>
                    <message>The decide reference will be ignored because the request is not legislative!</message>
                </informativeMessages>
            </return>
        </ns0:createLinguisticRequestResponse>
    </S:Body>
</S:Envelope>
',
                    ],
            ],
            $logger->records[2]
        );
    }
}
