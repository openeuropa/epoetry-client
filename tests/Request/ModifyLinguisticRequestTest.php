<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

/**
 * Test ModifyLinguisticRequest service.
 */
final class ModifyLinguisticRequestTest extends BaseRequestTest
{
    /**
     * Ensure the correct creation of an XML payload.
     */
    public function testXmlPayload(): void
    {
        $request = $this->getModifyLinguisticRequest();

        $expected = file_get_contents(__DIR__ . '/fixtures/modifyLinguisticRequest.xml');
        $request = $this->driver->encode('modifyLinguisticRequest', [$request]);
        $this->assertXmlStringEqualsXmlString($expected, $request->getRequest());
    }

    /**
     * Test validation of ModifyLinguisticRequest class.
     *
     * @dataProvider dataProviderModifyLinguisticRequest
     */
    public function testValidation($data, $expectations): void
    {
        $request = $this->serializer->fromArray($data, 'OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequest');
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
    public function dataProviderModifyLinguisticRequest(): array
    {
        return $this->getFixture('modifyLinguisticRequest.yaml', '/Request')['tests'];
    }
}
