<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use OpenEuropa\EPoetry\Tests\Request\Traits\CreateNewVersionTrait;

/**
 * Test CreateNewVersion service.
 */
final class CreateNewVersionTest extends BaseRequestTest
{
    use CreateNewVersionTrait;

    /**
     * Ensure the correct creation of an XML payload.
     */
    public function testXmlPayload(): void
    {
        $request = $this->getCreateNewVersion();

        $expected = file_get_contents(__DIR__ . '/fixtures/createNewVersion.xml');
        $request = $this->driver->encode('createNewVersion', [$request]);
        $this->assertXmlStringEqualsXmlString($expected, $request->getRequest());
    }

    /**
     * Test validation of CreateNewVersion class.
     *
     * @dataProvider dataProviderCreateNewVersion
     */
    public function testValidation($data, $expectations): void
    {
        $request = $this->serializer->fromArray($data, 'OpenEuropa\EPoetry\Request\Type\CreateNewVersion');
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
    public function dataProviderCreateNewVersion(): array
    {
        return $this->getFixture('createNewVersion.yaml', '/Request')['tests'];
    }
}
