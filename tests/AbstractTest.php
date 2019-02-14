<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use Http\Mock\Client;
use OpenEuropa\EPoetry\EPoetryClientFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

abstract class AbstractTest extends TestCase
{
    const FIXTURE_DIR = __DIR__ . '/fixtures';

    /**
     * @var EPoetryClientFactory
     */
    public $clientFactory;

    /**
     * @var \Http\Mock\Client
     */
    public $httpClient;

    /**
     * @var ExpressionLanguage
     */
    protected $expressionLanguage;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->httpClient = new Client();
        $this->expressionLanguage = new ExpressionLanguage();
        parent::setUp();
    }

    /**
     * Setup ePoetry client factory using HTTP mock client.
     *
     * @return \OpenEuropa\EPoetry\EPoetryClientFactory
     */
    protected function createClientFactory(): EPoetryClientFactory
    {
        $wsdl = __DIR__ . '/../resources/dgtServiceWSDL.xml';

        return new EPoetryClientFactory($wsdl, $this->httpClient);
    }
}
