<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\Tests\Request;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Tests\BaseTest;
use Soap\Engine\Driver;
use Soap\ExtSoapEngine\AbusedClient;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMap;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMapCollection;
use Soap\ExtSoapEngine\ExtSoapDriver;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\Wsdl\Loader\FlatteningLoader;
use Symfony\Component\Validator\ValidatorBuilder;

/**
 * Base test class for the "Request" ePoetry service.
 */
abstract class BaseRequestTest extends BaseTest
{
    protected Driver $driver;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        // Build ext-soap-engine classmap from v4 encoding classmap format.
        $classMaps = [];
        foreach (RequestClassmap::types() as $map) {
            $classMaps[] = new ClassMap($map->getXmlType(), $map->getPhpClassName());
        }
        $classMapCollection = new ClassMapCollection(...$classMaps);

        // Use FlatteningLoader to inline XSD imports, then encode as
        // a data URI for ext-soap's SoapClient.
        $loader = new FlatteningLoader(new LocalWsdlProvider());
        $wsdlUri = 'data://text/plain;base64,' . base64_encode($loader(__DIR__ . '/../../resources/request.wsdl'));
        $this->driver = ExtSoapDriver::createFromClient(
            AbusedClient::createFromOptions(
                ExtSoapOptions::defaults($wsdlUri)
                    ->withClassMap($classMapCollection)
                    ->disableWsdlCache()
            )
        );

        // Setup validator.
        $validatorBuilder = new ValidatorBuilder();
        $validatorBuilder->addYamlMapping(__DIR__ . '/../../config/validator/request.yaml');
        $this->validator = $validatorBuilder->getValidator();

        parent::setUp();
    }
}
