<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

/**
 * Test addNewPartToDossier service.
 */
final class AddNewPartToDossierRequestTest extends BaseRequestTest
{
    /**
     * Ensure the correct creation of an XML payload.
     */
    public function testXmlPayload(): void
    {
        $request = $this->getAddNewPartToDossier();

        $expected = file_get_contents(__DIR__ . '/fixtures/addNewPartToDossierRequest.xml');
        $request = $this->driver->encode('AddNewPartToDossier', [$request]);
        $this->assertXmlStringEqualsXmlString($expected, $request->getRequest());
    }

    /**
     * Test validation of AddNewPartToDossier class.
     *
     * @dataProvider dataProviderAddNewPartToDossierRequest
     */
    public function testValidation($data, $expectations): void
    {
        $request = $this->serializer->fromArray($data, 'OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier');
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
    public function dataProviderAddNewPartToDossierRequest(): array
    {
        return $this->getFixture('addNewPartToDossierRequest.yaml', '/Request')['tests'];
    }
}
