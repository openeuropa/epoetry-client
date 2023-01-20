<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

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
    public function testAddNewPartToDossierResponse($response, $expectations): void
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
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        $xml = file_get_contents(__DIR__.'/fixtures/createLinguisticRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('createLinguisticRequest', new SoapResponse($xml));
    }
}
