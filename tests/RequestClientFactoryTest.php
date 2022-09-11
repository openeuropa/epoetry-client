<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

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
use Phpro\SoapClient\Type\RequestInterface;
use Phpro\SoapClient\Type\ResultInterface;
use VCR\VCR;

/**
 * Test Serializer.
 */
final class RequestClientFactoryTest extends BaseTest
{

    public function testHeaderToken(): void
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

        $expectedSoapHeader = '<soap:Header xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws"><ecas:ProxyTicket xmlns:ecas="https://ecas.ec.europa.eu/cas/schemas/ws">[proxy ticket]</ecas:ProxyTicket></soap:Header>';

        // Enable VCR recording.
        VCR::turnOn();

        // Prepare vcr file. We will write to vcr file and read request from it.
        $vcrFile = 'vcr/request_client_factory-create_linguistic_request-1.yml';
        $this->removeVcrFile($vcrFile);
        VCR::insertCassette($vcrFile);

        // Token is absent in soap header by default.
        $this->sendRequest('createLinguisticRequest', $createLinguisticRequest);
        $result = $this->getFixture($vcrFile);
        $this->assertStringNotContainsString($expectedSoapHeader, $result[0]['request']['body']);

        // Prepare vcr file.
        $vcrFile = 'vcr/request_client_factory-create_linguistic_request-2.yml';
        $this->removeVcrFile($vcrFile);
        VCR::insertCassette($vcrFile);

        // Token exists in soap header if added.
        $this->sendRequest('createLinguisticRequest', $createLinguisticRequest, '[proxy ticket]');
        $result = $this->getFixture($vcrFile);
        $this->assertStringContainsString($expectedSoapHeader, $result[0]['request']['body']);

        // Turn off VCR recording.
        VCR::eject();
        VCR::turnOff();
    }

    /**
     * Sends request using RequestClientFactory.
     *
     * @param string $method
     *   Method to call.
     * @param RequestInterface $request
     *   Request to send.
     * @param string|null $proxyTicket
     *   Proxy ticket if needed.
     *
     * @return ResultInterface|null
     *   Result or null if request is failed.
     */
    protected function sendRequest(string $method, RequestInterface $request, ?string $proxyTicket = null): ?ResultInterface
    {
        $result = null;
        // Fake request is made that throws an exception if vcr file is absent.
        try {
            $requestClient = RequestClientFactory::factory('http://www.example.com', null, $proxyTicket);
            $result = $requestClient->{$method}($request);
        } catch (\Exception $e) {
            print sprintf("Request error: '%s'\n", $e->getMessage());
        }

        return $result;
    }

    /**
     * Removes vcr file.
     *
     * @param string $vcrFile
     *   Vcr file name.
     */
    protected function removeVcrFile(string $vcrFile): void
    {
        $vcrFilePath = __DIR__ . '/fixtures/' . $vcrFile;
        if (file_exists($vcrFilePath)) {
            unlink($vcrFilePath);
        }
    }
}
