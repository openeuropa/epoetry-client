<?php

namespace OpenEuropa\EPoetry\Tests\ExtSoapEngine;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use PHPUnit\Framework\TestCase;
use VeeWee\Xml\Dom\Document;

class LocalWsdlProviderTest extends TestCase
{
    /**
     * Tests that __invoke() returns raw XML with port overrides
     * and schema imports left as-is (for v4 WsdlLoader).
     */
    public function testInvokeReturnsRawXmlWithPortOverrides(): void
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('TestPort1', 'http://overridden.address1')
            ->withPortLocation('TestPort2', 'http://overridden.address2');
        $wsdl = __DIR__ . '/../fixtures/test.wsdl';

        // __invoke() returns raw XML, not a data URI.
        $xml = $wsdlProvider($wsdl);

        // Verify port locations are overridden.
        $this->assertStringContainsString('http://overridden.address1', $xml);
        $this->assertStringContainsString('http://overridden.address2', $xml);

        // Verify schema import is left as the original file reference,
        // not embedded as a data URI.
        $wsdlDoc = Document::fromXmlString($xml);
        $schemaLocation = $wsdlDoc->xpath()->querySingle("//*/xsd:schema/xsd:import")->getAttribute('schemaLocation');
        $this->assertEquals('test.xsd', $schemaLocation);
    }

    /**
     * Tests that toDataUri() returns a self-contained data URI with
     * embedded XSD (for PHP's native SoapServer).
     */
    public function testToDataUriReturnsSelfContainedWsdl(): void
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('TestPort1', 'http://overridden.address1')
            ->withPortLocation('TestPort2', 'http://overridden.address2');
        $wsdl = __DIR__ . '/../fixtures/test.wsdl';

        $dataUri = $wsdlProvider->toDataUri($wsdl);
        $this->assertStringStartsWith('data://text/plain;base64,', $dataUri);

        // Decode and verify content.
        $xml = file_get_contents($dataUri);
        $this->assertStringContainsString('http://overridden.address1', $xml);
        $this->assertStringContainsString('http://overridden.address2', $xml);

        // Verify schema is embedded as a data URI (self-contained).
        $wsdlDoc = Document::fromXmlString($xml);
        $schemaLocation = $wsdlDoc->xpath()->querySingle("//*/xsd:schema/xsd:import")->getAttribute('schemaLocation');
        $this->assertStringStartsWith('data://text/plain;base64,', $schemaLocation);

        // Verify the embedded schema is valid XML.
        $schemaXml = file_get_contents($schemaLocation);
        $this->assertStringContainsString('xsd:schema', $schemaXml);
    }
}
