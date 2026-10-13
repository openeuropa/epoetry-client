<?php

namespace OpenEuropa\EPoetry\ExtSoapEngine;

use Soap\Wsdl\Loader\WsdlLoader;
use VeeWee\Xml\Dom\Document;

/**
 * WsdlLoader that overrides port locations in local WSDL files.
 *
 * Returns raw XML with port addresses replaced. Schema imports are
 * left as-is so the v4 WSDL reader can resolve them via FlatteningLoader.
 *
 * When used with FlatteningLoader, this method is called for both
 * the WSDL and its XSD imports. Port overrides are silently skipped
 * for files that don't contain port definitions (e.g. XSD files).
 */
class LocalWsdlProvider implements WsdlLoader
{
    /**
     * Port location overrides, keyed by port name.
     *
     * @var array
     */
    private array $ports = [];

    /**
     * Register a port location override.
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
     * Load a WSDL/XSD file and apply port location overrides.
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
}
