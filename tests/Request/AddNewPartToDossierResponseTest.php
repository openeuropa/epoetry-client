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
     * Tests AddNewPartToDossierResponse decoding.
     *
     * @dataProvider dataProviderRequestResponse
     */
    public function testRequestResponse($response, $expectations): void
    {
        $xml = file_get_contents(__DIR__ . '/fixtures/' . $response);
        $response = $this->driver->decode('addNewPartToDossier', new SoapResponse($xml));
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $response]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderRequestResponse(): array
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
