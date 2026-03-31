<?php

namespace OpenEuropa\EPoetry\ExtSoapEngine;

use Soap\Wsdl\Loader\WsdlLoader;
use VeeWee\Xml\Dom\Document;
use VeeWee\XML\DOM\Xpath;

class LocalWsdlProvider implements WsdlLoader
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
     * Load WSDL content with port location overrides.
     *
     * Returns raw XML string with port addresses replaced. Schema
     * imports are left as-is so the v4 WSDL reader can resolve them
     * from the file system via FlatteningLoader.
     *
     * When used with FlatteningLoader, this method is called for both
     * the WSDL and its XSD imports. Port overrides are silently skipped
     * for files that don't contain port definitions (e.g. XSD files).
     *
     * @inheritDoc
     */
    public function __invoke(string $location): string
    {
        $wsdl = Document::fromXmlFile($location);

        foreach ($this->ports as $port_name => $port_location) {
            $elements = $wsdl->xpath()->query("//*[local-name()='port'][@name='{$port_name}']/*");
            if ($elements->count() > 0) {
                $elements->first()->setAttribute('location', $port_location);
            }
        }

        return $wsdl->toXmlString();
    }

    /**
     * Return the WSDL as a self-contained base64-encoded data URI.
     *
     * Embeds XSD schema imports inline so the WSDL is fully
     * self-contained. Used by NotificationServerFactory for PHP's
     * native SoapServer, which requires a URI and cannot resolve
     * file-based schema imports.
     *
     * @param string $location
     *   Path to the WSDL file.
     *
     * @return string
     *   A data:// URI containing the base64-encoded WSDL.
     */
    public function toDataUri(string $location): string
    {
        $wsdl = Document::fromXmlFile($location);

        foreach ($this->ports as $port_name => $port_location) {
            $element = $wsdl->xpath()->querySingle("//*[local-name()='port'][@name='{$port_name}']/*");
            $element->setAttribute('location', $port_location);
        }

        // Embed XSD imports inline so the data URI is self-contained.
        $schema_import = $wsdl->xpath()->query("//*/xsd:schema/xsd:import");
        if ($schema_import->count()) {
            $schema_location = $schema_import->first()->getAttribute('schemaLocation');
            $schema = Document::fromXmlFile(dirname($location) . DIRECTORY_SEPARATOR . $schema_location);

            $wsdl->xpath()->querySingle("//*/xsd:schema/xsd:import")
                ->setAttribute('schemaLocation', 'data://text/plain;base64,' . base64_encode($schema->toXmlString()));
        }

        return 'data://text/plain;base64,' . base64_encode($wsdl->toXmlString());
    }
}
