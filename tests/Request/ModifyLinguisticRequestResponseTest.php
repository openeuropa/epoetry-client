<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test ModifyLinguisticRequestResponse service.
 */
final class ModifyLinguisticRequestResponseTest extends BaseRequestTest
{
    /**
     * Tests modifyLinguisticRequestResponse xml into object conversion.
     *
     * @dataProvider dataProviderModifyLinguisticRequestResponse
     */
    public function testModifyLinguisticRequestResponse($response, $expectations): void
    {
        $object = $this->serializer->deserialize($response, 'OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestResponse', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $object]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderModifyLinguisticRequestResponse(): array
    {
        return $this->getFixture('modifyLinguisticRequestResponse.yaml', '/Request');
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        $xml = file_get_contents(__DIR__ . '/fixtures/modifyLinguisticRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('modifyLinguisticRequest', new SoapResponse($xml));
    }
}
