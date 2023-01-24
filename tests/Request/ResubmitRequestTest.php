<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use OpenEuropa\EPoetry\Tests\Request\Traits\ResubmitRequestTrait;

/**
 * Test resubmitRequest service.
 */
final class ResubmitRequestTest extends BaseRequestTest
{
    use ResubmitRequestTrait;

    /**
     * Ensure the correct creation of an XML payload.
     */
    public function testXmlPayload(): void
    {
        $request = $this->getResubmitRequest();

        $expected = file_get_contents(__DIR__.'/fixtures/resubmitRequest.xml');
        $request = $this->driver->encode('resubmitRequest', [$request]);
        $this->assertXmlStringEqualsXmlString($expected, $request->getRequest());
    }

    /**
     * Test validation of ResubmitRequest class.
     *
     * @dataProvider dataProviderResubmitRequest
     */
    public function testValidation($data, $expectations): void
    {
        $request = $this->serializer->fromArray($data, 'OpenEuropa\EPoetry\Request\Type\ResubmitRequest');
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
    public function dataProviderResubmitRequest(): array
    {
        return $this->getFixture('resubmitRequest.yaml', '/Request')['tests'];
    }
}
