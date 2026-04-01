<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\Tests\Request;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\Type;
use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequestResponse;
use OpenEuropa\EPoetry\Request\Type\InformativeMessages;
use OpenEuropa\EPoetry\RequestClientFactory;
use Soap\Encoding\Driver as EncodingDriver;
use Soap\Engine\HttpBinding\SoapResponse;
use Soap\Wsdl\Loader\FlatteningLoader;
use Soap\WsdlReader\Wsdl1Reader;

/**
 * Test CreateLinguisticRequestResponse service.
 */
final class CreateLinguisticRequestResponseTest extends BaseRequestTest
{
    /**
     * Tests createLinguisticRequestResponse xml into object conversion.
     *
     * @dataProvider dataProviderCreateLinguisticRequestResponse
     */
    public function testCreateLinguisticRequestResponse($response, $expectations): void
    {
        $object = $this->serializer->deserialize($response, 'OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequestResponse', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $object]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderCreateLinguisticRequestResponse(): array
    {
        return $this->getFixture('createLinguisticRequestResponse.yaml', '/Request');
    }

    /**
     * Tests SOAP v4 engine decoding of createLinguisticRequestResponse.
     *
     * This mirrors the production decode path used by RequestClientFactory,
     * which uses php-soap/encoding (v4 engine), NOT the ext-soap driver.
     */
    public function testSoapEngineDecodeResponse(): void
    {
        $wsdlLoader = new FlatteningLoader(new LocalWsdlProvider());
        $wsdl = (new Wsdl1Reader($wsdlLoader))(__DIR__ . '/../../resources/request.wsdl');
        $driver = EncodingDriver::createFromWsdl1(
            $wsdl,
            null,
            RequestClientFactory::buildEncoderRegistry()
        );

        $xml = file_get_contents(__DIR__ . '/fixtures/createLinguisticRequestResponse.xml');
        $response = $driver->decode('createLinguisticRequest', new SoapResponse($xml));

        $this->assertInstanceOf(CreateLinguisticRequestResponse::class, $response);

        // Verify trackChanges on product is boolean false, not NULL.
        // Use reflection to check the actual property value, because
        // isTrackChanges() silently coerces NULL to false without strict_types.
        $product = $response->getReturn()->getRequestDetails()->getProducts()->getProduct()[0];
        $ref = new \ReflectionProperty($product, 'trackChanges');
        $ref->setAccessible(true);
        $this->assertSame(false, $ref->getValue($product), 'Product trackChanges should be boolean false, not NULL');

        // Verify trackChanges on originalDocument is boolean false, not NULL.
        $originalDocument = $response->getReturn()->getRequestDetails()->getOriginalDocument();
        $ref = new \ReflectionProperty($originalDocument, 'trackChanges');
        $ref->setAccessible(true);
        $this->assertSame(false, $ref->getValue($originalDocument), 'OriginalDocument trackChanges should be boolean false, not NULL');

        // Verify informativeMessages is the typed class, not stdClass.
        $informativeMessages = $response->getReturn()->getInformativeMessages();
        $this->assertInstanceOf(InformativeMessages::class, $informativeMessages);
        $this->assertEquals(
            ['The decide reference will be ignored because the request is not legislative!'],
            $informativeMessages->getMessage()
        );
    }

    /**
     * Tests v4 engine encoding of boolean false as XML attribute.
     *
     * Without the php-soap/encoding patch, boolean false attributes (like
     * trackChanges on productRequestIn) are silently dropped because the
     * ObjectEncoder uses a truthiness check instead of a null check.
     */
    public function testSoapEngineEncodesBooleanAttributes(): void
    {
        $wsdlLoader = new FlatteningLoader(new LocalWsdlProvider());
        $wsdl = (new Wsdl1Reader($wsdlLoader))(__DIR__ . '/../../resources/request.wsdl');
        $driver = EncodingDriver::createFromWsdl1(
            $wsdl,
            null,
            RequestClientFactory::buildEncoderRegistry()
        );

        $contact = new Type\ContactPersonIn('test', 'RECIPIENT');
        $contacts = new Type\Contacts();
        $contacts->addContact($contact);

        $linguisticSection = new Type\LinguisticSectionIn('EN');
        $linguisticSections = new Type\LinguisticSections();
        $linguisticSections->addLinguisticSection($linguisticSection);

        $originalDoc = new Type\OriginalDocumentIn();
        $originalDoc->setFileName('test.html');
        $originalDoc->setTrackChanges(false);
        $originalDoc->setLinguisticSections($linguisticSections);

        $product = new Type\ProductRequestIn();
        $product->setLanguage('BG');
        $product->setTrackChanges(false);
        $product->setRequestedDeadline(new \DateTimeImmutable('2026-04-10T23:59:00+02:00'));

        $products = new Type\Products();
        $products->addProduct($product);

        $details = new Type\RequestDetailsIn();
        $details->setTitle('Test');
        $details->setContacts($contacts);
        $details->setOriginalDocument($originalDoc);
        $details->setProducts($products);

        $dossier = new Type\DossierReference();
        $dossier->setRequesterCode('DIGIT');
        $dossier->setNumber(1008);
        $dossier->setYear(2026);

        $request = new Type\AddNewPartToDossier();
        $request->setDossier($dossier);
        $request->setRequestDetails($details);
        $request->setApplicationName('digit');

        $encoded = $driver->encode('addNewPartToDossier', [$request]);
        $xml = $encoded->getRequest();

        // trackChanges as attribute on <product> must be present.
        $this->assertStringContainsString('trackChanges="false"', $xml);
        // trackChanges as element on <originalDocument> must be present.
        $this->assertStringContainsString('<trackChanges>false</trackChanges>', $xml);
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        $xml = file_get_contents(__DIR__ . '/fixtures/createLinguisticRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('createLinguisticRequest', new SoapResponse($xml));
    }
}
