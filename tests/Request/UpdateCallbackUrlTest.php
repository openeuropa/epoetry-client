<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrl;

/**
 * Test updateCallbackUrl service.
 */
final class UpdateCallbackUrlTest extends BaseRequestTest
{
    /**
     * Ensure the correct creation of an XML payload.
     */
    public function testXmlPayload(): void
    {
        $request = $this->getUpdateCallbackUrl();
        $expected = file_get_contents(__DIR__ . '/fixtures/updateCallbackUrl.xml');
        $request = $this->driver->encode('updateCallbackUrl', [$request]);
        $this->assertXmlStringEqualsXmlString($expected, $request->getRequest());
    }

    /**
     * Test validation of UpdateCallbackUrl class.
     *
     * @dataProvider dataProviderUpdateCallbackUrl
     */
    public function testValidation($data, $expectations): void
    {
        $request = $this->serializer->fromArray($data, 'OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrl');
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
    public function dataProviderUpdateCallbackUrl(): array
    {
        return $this->getFixture('updateCallbackUrl.yaml', '/Request')['tests'];
    }

    /**
     * Builds UpdateCallbackUrl object.
     */
    protected function getUpdateCallbackUrl(): UpdateCallbackUrl
    {
        return (new UpdateCallbackUrl())
            ->setCallbackUrl('http://example.com')
            ->setApplicationName('appname');
    }
}
