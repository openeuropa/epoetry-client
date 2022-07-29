<?php

namespace OpenEuropa\EPoetry\Tests\ExtSoapEngine;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use PHPUnit\Framework\TestCase;
use VeeWee\Xml\Dom\Document;

class LocalWsdlProviderTest extends TestCase
{

    public function testProvider(): void
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('TestPort', 'http://overridden.address');
        $wsdl = __DIR__.'/../fixtures/test.wsdl';
        $wsdl_location = $wsdlProvider($wsdl);

        $xml = file_get_contents($wsdl_location);

        $expected = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<!-- Not an actual, working WSDL file, this is just for testing purposes. -->
<definitions xmlns="http://schemas.xmlsoap.org/wsdl/" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap" xmlns:xsd="http://www.w3.org/2001/XMLSchema" name="HelloService">
    <types>
        <xsd:schema>
            <xsd:import schemaLocation="data://text/plain;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPCEtLSBOb3QgYW4gYWN0dWFsLCB3b3JraW5nIFhTRCBmaWxlLCB0aGlzIGlzIGp1c3QgZm9yIHRlc3RpbmcgcHVycG9zZXMuIC0tPgo8eHNkOnNjaGVtYSB4bWxuczp4c2Q9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIi8+Cg=="/>
        </xsd:schema>
    </types>
    <service name="TestService">
        <port binding="tns:TestBinding" name="TestPort">
            <soap:address location="http://overridden.address"/>
        </port>
    </service>
</definitions>
XML;
        $this->assertEquals($expected, trim($xml));

        // Fetch schema and assert its validity.
        $wsdl = Document::fromXmlString($xml);
        $schema_location = $wsdl->xpath()->querySingle("//*/xsd:schema/xsd:import")->getAttribute('schemaLocation');
        $xml = file_get_contents($schema_location);

        $expected = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<!-- Not an actual, working XSD file, this is just for testing purposes. -->
<xsd:schema xmlns:xsd="http://www.w3.org/2001/XMLSchema"/>
XML;
        $this->assertEquals($expected, trim($xml));
    }
}
