<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use Http\Mock\Client;
use OpenEuropa\EPoetry\EPoetryClientFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
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
        $this->expressionLanguage->addFunction(ExpressionFunction::fromPhp('count'));
        $this->expressionLanguage->addFunction(ExpressionFunction::fromPhp('is_a'));
        $this->expressionLanguage->addFunction(ExpressionFunction::fromPhp('strpos'));

        parent::setUp();
    }

    /**
     * Assert a list of Expression Language expressions.
     *
     * @param array $expressions
     * @param array $values
     */
    protected function assertExpressionLanguageExpressions(array $expressions, array $values)
    {
        foreach ($expressions as $expression) {
            $this->assertTrue(
                $this->expressionLanguage->evaluate(
                    $expression,
                    $values
                ),
                sprintf('The expression [%s] failed to evaluate to true.', $expression)
            );
        }
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
