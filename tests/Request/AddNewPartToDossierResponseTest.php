<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test AddNewPartToDossierResponse service.
 */
final class AddNewPartToDossierResponseTest extends BaseRequestTest
{
    /**
     * Tests addNewPartToDossierResponse xml into object conversion.
     *
     * @dataProvider dataProviderAddNewPartToDossierResponse
     */
    public function testAddNewPartToDossierResponse($response, $expectations): void
    {
        $object = $this->serializer->deserialize($response, 'OpenEuropa\EPoetry\Request\Type\AddNewPartToDossierResponse', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $object]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderAddNewPartToDossierResponse(): array
    {
        return $this->getFixture('addNewPartToDossierResponse.yaml', '/Request');
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        $xml = file_get_contents(__DIR__.'/fixtures/addNewPartToDossierResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error finding the dossier The dossier does not exist in ePoetry system!');
        $this->driver->decode('createLinguisticRequest', new SoapResponse($xml));
    }
}
