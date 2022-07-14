<?php

namespace OpenEuropa\EPoetry\ExtSoapEngine;

use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\ExtSoapEngine\Wsdl\WsdlProvider;
use VeeWee\Xml\Dom\Document;
use VeeWee\XML\DOM\Xpath;

class LocalWsdlProvider implements WsdlProvider
{
    private string $portName;

    private string $portLocation;

    /**
     * Override address for a given port name.
     *
     * @param string $name
     * @param string $location
     *
     * @return $this
     */
    public function withPortLocation(string $name, string $location): LocalWsdlProvider
    {
        $this->portName = $name;
        $this->portLocation = $location;

        return $this;
    }

    private function hasPortLocation(): bool
    {
        return !empty($this->portName) && !empty($this->portLocation);
    }

    /**
     * @inheritDoc
     */
    public function __invoke(string $location): string
    {
        $wsdl = Document::fromXmlFile($location);

        if ($this->hasPortLocation()) {
            $element = $wsdl->xpath()->querySingle("//*[local-name()='port'][@name='{$this->portName}']/soap:address");
            $element->setAttribute('location', $this->portLocation);
        }

        // Look for a schema import in the WSDL file.
        $schema_import = $wsdl->xpath()->query("//*/xsd:schema/xsd:import");
        if ($schema_import->count()) {
            // Assume that the XSD file sits right next to its WSDL counterpart.
            $schema_location = $schema_import->first()->getAttribute('schemaLocation');
            $schema = Document::fromXmlFile(dirname($location).DIRECTORY_SEPARATOR.$schema_location);

            // Sent encoded XSD back into the WSDL file.
            $wsdl->xpath()->querySingle("//*/xsd:schema/xsd:import")
                ->setAttribute('schemaLocation', 'data://text/plain;base64,' . base64_encode($schema->toXmlString()));
        }

        // Return encoded WSDL.
        return 'data://text/plain;base64,' . base64_encode($wsdl->toXmlString());
    }
}
