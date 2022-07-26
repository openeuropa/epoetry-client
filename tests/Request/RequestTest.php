<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut;
use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
use OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn;
use OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\RequestReferenceIn;
use Phpro\SoapClient\Caller\EngineCaller;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Soap\Engine\Driver;
use Soap\Engine\SimpleEngine;
use Soap\ExtSoapEngine\AbusedClient;
use Soap\ExtSoapEngine\ExtSoapDriver;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\ExtSoapEngine\Transport\TraceableTransport;
use Soap\Psr18Transport\Psr18Transport;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * @internal
 * @coversNothing
 */
final class RequestTest extends TestCase
{

    /**
     * Request driver.
     *
     * @var \Soap\Engine\Driver|\Soap\ExtSoapEngine\ExtSoapDriver
     */
    protected Driver $driver;

    /**
     * @var \Soap\ExtSoapEngine\Transport\TraceableTransport
     */
    protected TraceableTransport $transport;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->driver = ExtSoapDriver::createFromClient(
            AbusedClient::createFromOptions(
                ExtSoapOptions::defaults(__DIR__.'/../../resources/request.wsdl')
                    ->withClassMap(RequestClassmap::getCollection())
                    ->withWsdlProvider(new LocalWsdlProvider())
                    ->disableWsdlCache()
            )
        );
        parent::setUp();
    }

    /**
     * Test a SOAP request.
     */
    public function testRequestSending(): void
    {
        $requestDetails = new RequestDetailsIn();
        $requestDetails->setTitle('test for DOC - success')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2022-07-01T11:51:00+01:00'))
            ->setSensitive(false)
            ->setDestination('PUBLIC')
            ->setProcedure('DEGHP')
            ->setSlaAnnex('ANNEX8A')
            ->setSlaCommitment('2225555')
            ->setComment('comment')
            ->setAccessibleTo('CONTACTS')
            ->setKeyword1('keyw1')
            ->setKeyword2('key2')
            ->setKeyword3('aaaaaaaaaaaaaaa');
        $contacts = (new Contacts())
            ->addContact(new ContactPersonIn('liekejo', 'REQUESTER'))
            ->addContact(new ContactPersonIn('liekejo', 'AUTHOR'))
            ->addContact(new ContactPersonIn('liekejo', 'RECIPIENT'));
        $requestDetails->setContacts($contacts);

        $linguisticSections = (new LinguisticSections())
            ->addLinguisticSection(new LinguisticSectionOut('FR'));
        $originalDocument = (new OriginalDocumentIn())
            ->setTrackChanges(false)
            ->setFileName('TEST_FILE_ORIGINALP.docx')
            ->setContent('cid:267736828531')
            ->setLinguisticSections($linguisticSections)
            ->setComment('');
        $requestDetails->setOriginalDocument($originalDocument);

        $modifyProductRequestIn = (new ModifyProductRequestIn())
            ->setLanguage('FR')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2021-07-06T11:51:00+01:00'))
            ->setTrackChanges(false);
        $products = (new Products())
            ->addProduct($modifyProductRequestIn);
        $requestDetails->setProducts($products);

        $request = (new CreateLinguisticRequest())
            ->setRequestDetails($requestDetails)
            ->setApplicationName('appname')
            ->setTemplateName('templatename');

        $expected = file_get_contents(__DIR__.'/fixtures/createLinguisticRequest.xml');
        $request = $this->driver->encode('createLinguisticRequest', [$request]);
        $this->assertXmlStringEqualsXmlString($expected, $request->getRequest());
    }
}
