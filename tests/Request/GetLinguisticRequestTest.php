<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

/**
 * Test GetLinguisticRequest service.
 */
final class GetLinguisticRequestTest extends BaseRequestTest
{
    /**
     * Ensure the correct creation of an XML payload.
     */
    public function testXmlPayload(): void
    {
        $request = $this->getGetLinguisticRequest();

        $expected = file_get_contents(__DIR__ . '/fixtures/getLinguisticRequest.xml');
        $request = $this->driver->encode('getLinguisticRequest', [$request]);
        $this->assertXmlStringEqualsXmlString($expected, $request->getRequest());
    }

    /**
     * Test validation of GetLinguisticRequest class.
     *
     * @dataProvider dataProviderGetLinguisticRequest
     */
    public function testValidation($data, $expectations): void
    {
        $request = $this->serializer->fromArray($data, 'OpenEuropa\EPoetry\Request\Type\GetLinguisticRequest');
        $violations = $this->validator->validate($request);
        $values = [
            'violations' => $violations,
        ];
        $this->assertExpressionLanguageExpressions($expectations['assertions'], $values);
    }

    /**
     * Data provider.
     *
     * The actual data is read from fixtures stored in a YAML configuration.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderGetLinguisticRequest(): array
    {
        return $this->getFixture('getLinguisticRequest.yaml', '/Request')['tests'];
    }
}
