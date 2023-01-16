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
}
