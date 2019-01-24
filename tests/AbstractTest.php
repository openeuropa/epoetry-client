<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use Http\Mock\Client;
use OpenEuropa\EPoetry\EPoetryClientFactory;
use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase
{
    /** @var EPoetryClientFactory */
    public $clientFactory;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->clientFactory = $this->createClientFactory();
        parent::setUp();
    }

    protected function createClientFactory(): EPoetryClientFactory
    {
        $wsdl = 'resources/dgtServiceWSDL.xml';
        $httpClient = new Client();

        return new EPoetryClientFactory($wsdl, $httpClient);
    }
}
