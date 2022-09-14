<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

/**
 * Test createLinguisticRequest service.
 */
final class CreateLinguisticRequestTest extends BaseRequestTest
{
    /**
     * Ensure the correct creation of an XML payload.
     */
    public function testXmlPayload(): void
    {
        $request = $this->getCreateLinguisticRequest();

        $expected = file_get_contents(__DIR__.'/fixtures/createLinguisticRequest.xml');
        $request = $this->driver->encode('createLinguisticRequest', [$request]);
        $this->assertXmlStringEqualsXmlString($expected, $request->getRequest());
    }

    /**
     * Test validation of CreateLinguisticRequest class.
     *
     * @dataProvider dataProviderCreateLinguisticRequest
     */
    public function testValidation($data, $expectations): void
    {
        $request = $this->serializer->fromArray($data, 'OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest');
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
    public function dataProviderCreateLinguisticRequest(): array
    {
        return $this->getFixture('createLinguisticRequest.yaml', '/Request')['tests'];
    }
}
