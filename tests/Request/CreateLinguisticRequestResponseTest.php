<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\Tests\Request;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
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
        $product = $response->getReturn()->getRequestDetails()->getProducts()->getProduct()[0];
        $this->assertFalse($product->isTrackChanges(), 'Product trackChanges should be false, not NULL');

        // Verify trackChanges on originalDocument is boolean false, not NULL.
        $originalDocument = $response->getReturn()->getRequestDetails()->getOriginalDocument();
        $this->assertFalse($originalDocument->isTrackChanges(), 'OriginalDocument trackChanges should be false, not NULL');

        // Verify informativeMessages is the typed class, not stdClass.
        $informativeMessages = $response->getReturn()->getInformativeMessages();
        $this->assertInstanceOf(InformativeMessages::class, $informativeMessages);
        $this->assertEquals(
            ['The decide reference will be ignored because the request is not legislative!'],
            $informativeMessages->getMessage()
        );
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
