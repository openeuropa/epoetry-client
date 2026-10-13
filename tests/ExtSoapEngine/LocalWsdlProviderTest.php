<?php

namespace OpenEuropa\EPoetry\Tests\ExtSoapEngine;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use PHPUnit\Framework\TestCase;
use Soap\Wsdl\Loader\FlatteningLoader;
use VeeWee\Xml\Dom\Document;

class LocalWsdlProviderTest extends TestCase
{
    /**
     * Tests that __invoke() returns raw XML with port overrides
     * and schema imports left as-is for FlatteningLoader to resolve.
     */
    public function testInvokeReturnsRawXmlWithPortOverrides(): void
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('TestPort1', 'http://overridden.address1')
            ->withPortLocation('TestPort2', 'http://overridden.address2');
        $wsdl = __DIR__ . '/../fixtures/test.wsdl';

        $xml = $wsdlProvider($wsdl);

        // Port locations are overridden.
        $this->assertStringContainsString('http://overridden.address1', $xml);
        $this->assertStringContainsString('http://overridden.address2', $xml);

        // Schema import is left as-is (not inlined).
        $wsdlDoc = Document::fromXmlString($xml);
        $schemaLocation = $wsdlDoc->xpath()->querySingle("//*/xsd:schema/xsd:import")->getAttribute('schemaLocation');
        $this->assertEquals('test.xsd', $schemaLocation);
    }

    /**
     * Tests that port overrides are skipped for files without ports
     * (e.g. XSD files loaded by FlatteningLoader).
     */
    public function testInvokeSkipsPortOverridesForNonWsdlFiles(): void
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('TestPort1', 'http://overridden.address1');
        $xsd = __DIR__ . '/../fixtures/test.xsd';

        // Should not throw, even though the XSD has no port elements.
        $xml = $wsdlProvider($xsd);
        $this->assertStringContainsString('testElement', $xml);
    }

    /**
     * Tests that FlatteningLoader inlines XSD imports when wrapping
     * LocalWsdlProvider. This is how the v4 engine resolves schemas.
     */
    public function testFlatteningLoaderInlinesXsdImport(): void
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('TestPort1', 'http://overridden.address1')
            ->withPortLocation('TestPort2', 'http://overridden.address2');
        $wsdl = __DIR__ . '/../fixtures/test.wsdl';

        $flatteningLoader = new FlatteningLoader($wsdlProvider);
        $xml = $flatteningLoader($wsdl);

        // The XSD content is inlined: testElement appears in the output
        // and schemaLocation is removed.
        $this->assertStringContainsString('testElement', $xml);
        $this->assertStringNotContainsString('schemaLocation', $xml);

        // Port overrides are preserved.
        $this->assertStringContainsString('http://overridden.address1', $xml);
        $this->assertStringContainsString('http://overridden.address2', $xml);
    }
}
