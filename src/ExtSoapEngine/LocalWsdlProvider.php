<?php

namespace OpenEuropa\EPoetry\ExtSoapEngine;

use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\ExtSoapEngine\Wsdl\WsdlProvider;
use VeeWee\Xml\Dom\Document;
use VeeWee\XML\DOM\Xpath;

class LocalWsdlProvider implements WsdlProvider
{
    /**
     * Array of port locations, keyed by port name.
     *
     * @var array
     */
    private array $ports = [];

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
        $this->ports[$name] = $location;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(string $location): string
    {
        $wsdl = Document::fromXmlFile($location);

        foreach ($this->ports as $port_name => $port_location) {
            $element = $wsdl->xpath()->querySingle("//*[local-name()='port'][@name='{$port_name}']/*");
            $element->setAttribute('location', $port_location);
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
