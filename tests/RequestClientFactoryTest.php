<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use Consolidation\Log\Logger;
use Http\Adapter\Guzzle6\Client as GuzzleHttpClient;
use Http\Mock\Client as MockClient;
use OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\DocumentIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut;
use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use OpenEuropa\EPoetry\Request\Type\ProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\ReferenceDocuments;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\SrcDocumentIn;
use OpenEuropa\EPoetry\RequestClientFactory;
use Nyholm\Psr7\Response;
use Soap\ExtSoapEngine\AbusedClient;
use Soap\Psr18Transport\Psr18Transport;
use Soap\ExtSoapEngine\Transport\TraceableTransport;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Console\Output\BufferedOutput;

/**
 * Test RequestClientFactory.
 */
final class RequestClientFactoryTest extends BaseTest
{

    public function testProxyTicket(): void
    {
        $expectedHeader = '<soap:Header xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws"><ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">[proxy ticket]</ecas:ProxyTicket></soap:Header>';
        $expectedBody = '<SOAP-ENV:Body><ns1:createLinguisticRequest><requestDetails><title>Request title</title>';

        $mockClient = new MockClient();

        // Assert proxy token exists in the header.
        $mockClient->addResponse(new Response(200, [], $this->getCreateLinguisticRequestResponse()));
        $clientFactory = new RequestClientFactory('http://foo.bar', '[proxy ticket]', null, null, $mockClient);
        $requestClient = $clientFactory->getRequestClient();
        $requestClient->createLinguisticRequest($this->getCreateLinguisticRequest());
        $body = (string) $mockClient->getLastRequest()->getBody();
        $this->assertStringContainsString($expectedBody, $body);
        $this->assertStringContainsString($expectedHeader, $body);

        // Assert header with token doesn't exist in the request.
        $mockClient->addResponse(new Response(200, [], $this->getCreateLinguisticRequestResponse()));
        $clientFactory = new RequestClientFactory('http://foo.bar', '', null, null, $mockClient);
        $requestClient = $clientFactory->getRequestClient();
        $requestClient->createLinguisticRequest($this->getCreateLinguisticRequest());
        $body = (string) $mockClient->getLastRequest()->getBody();
        $this->assertStringContainsString($expectedBody, $body);
        $this->assertStringNotContainsString($expectedHeader, $body);
    }

    /**
     * Gets CreateLinguisticRequest instance.
     *
     * @return CreateLinguisticRequest
     */
    protected function getCreateLinguisticRequest(): CreateLinguisticRequest
    {
        // Prepare request object.
        $document = new DocumentIn();
        $document->setFileName('test.docx')
            ->setLanguage('EN')
            ->setComment('test')
            ->setContent('cid:303605824112');

        $referenceDocuments = new ReferenceDocuments();
        $referenceDocuments->addDocument($document);

        $srcDocument = new SrcDocumentIn();
        $srcDocument->setFileName('test2222SRC.docx')
            ->setComment('777888877')
            ->setContent('cid:1531884704226');

        $auxiliaryDocuments = new AuxiliaryDocumentsIn();
        $auxiliaryDocuments->setReferenceDocuments($referenceDocuments)
            ->setSrcDocument($srcDocument);

        $requestDetails = new RequestDetailsIn();
        $requestDetails->setTitle('Request title')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2023-07-01T11:51:00+01:00'))
            ->setDestination('PUBLIC')
            ->setProcedure('DEGHP')
            ->setSlaAnnex('ANNEX8A')
            ->setAuxiliaryDocuments($auxiliaryDocuments);
        $contacts = (new Contacts())
            ->addContact(new ContactPersonIn('liekejo', 'REQUESTER'))
            ->addContact(new ContactPersonIn('liekejo', 'AUTHOR'))
            ->addContact(new ContactPersonIn('liekejo', 'RECIPIENT'));
        $requestDetails->setContacts($contacts);

        $linguisticSections = (new LinguisticSections())
            ->addLinguisticSection(new LinguisticSectionOut('EN'));
        $originalDocument = (new OriginalDocumentIn())
            ->setTrackChanges(false)
            ->setFileName('TEST_FILE_ORIGINALP.docx')
            ->setContent('cid:267736828531')
            ->setLinguisticSections($linguisticSections)
            ->setComment('');
        $requestDetails->setOriginalDocument($originalDocument);

        $productRequestIn = (new ProductRequestIn())
            ->setLanguage('FR')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2021-07-06T11:51:00+01:00'))
            ->setTrackChanges(false);
        $products = (new Products())
            ->addProduct($productRequestIn);
        $requestDetails->setProducts($products);

        $createLinguisticRequest = (new CreateLinguisticRequest())
            ->setRequestDetails($requestDetails)
            ->setApplicationName('appname')
            ->setTemplateName('DEFAULT');

        return $createLinguisticRequest;
    }

    /**
     * Gets xml of createLinguisticRequestResponse.
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
        $clientFactory = new RequestClientFactory('http://foo.bar');
        $this->assertEquals('http://foo.bar', $clientFactory->getEndpoint());
        $this->assertEmpty($clientFactory->getProxyTicket());
        $this->assertInstanceOf(EventDispatcher::class, $clientFactory->getEventDispatcher());
        $this->assertEmpty($clientFactory->getLogger());
        $this->assertInstanceOf(GuzzleHttpClient::class, $clientFactory->getHttpClient());
        $this->assertInstanceOf(Psr18Transport::class, $clientFactory->getTransport());

        $clientFactory = new RequestClientFactory('http://foo.bar', '[proxy ticket]', new EventDispatcher(), new Logger(new BufferedOutput()), new MockClient(), new TraceableTransport(new AbusedClient(__DIR__.'/../resources/request.wsdl'), Psr18Transport::createWithDefaultClient()));
        $this->assertEquals('[proxy ticket]', $clientFactory->getProxyTicket());
        $this->assertInstanceOf(EventDispatcher::class, $clientFactory->getEventDispatcher());
        $this->assertInstanceOf(Logger::class, $clientFactory->getLogger());
        $this->assertInstanceOf(MockClient::class, $clientFactory->getHttpClient());
        $this->assertInstanceOf(TraceableTransport::class, $clientFactory->getTransport());
    }
}
