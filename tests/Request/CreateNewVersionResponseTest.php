<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test CreateNewVersionResponse service.
 */
final class CreateNewVersionResponseTest extends BaseRequestTest
{
    /**
     * Tests createNewVersionResponse xml into object conversion.
     *
     * @dataProvider dataProviderCreateNewVersionResponse
     */
    public function testCreateNewVersionResponse($response, $expectations): void
    {
        $object = $this->serializer->deserialize($response, 'OpenEuropa\EPoetry\Request\Type\CreateNewVersionResponse', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $object]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderCreateNewVersionResponse(): array
    {
        return $this->getFixture('createNewVersionResponse.yaml', '/Request');
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        // Use response error as in createLinguisticRequestResponse since we don't have another example.
        $xml = file_get_contents(__DIR__ . '/fixtures/createLinguisticRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('createNewVersion', new SoapResponse($xml));
    }
}
