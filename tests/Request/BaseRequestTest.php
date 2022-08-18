<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Tests\BaseTest;
use Soap\Engine\Driver;
use Soap\ExtSoapEngine\AbusedClient;
use Soap\ExtSoapEngine\ExtSoapDriver;
use Soap\ExtSoapEngine\ExtSoapOptions;
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
        // Setup SOAP driver.
        $this->driver = ExtSoapDriver::createFromClient(
            AbusedClient::createFromOptions(
                ExtSoapOptions::defaults(__DIR__ . '/../../resources/request.wsdl')
                    ->withClassMap(RequestClassmap::getCollection())
                    ->withWsdlProvider(new LocalWsdlProvider())
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
