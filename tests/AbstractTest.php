<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use Http\Mock\Client;
use OpenEuropa\EPoetry\EPoetryClientFactory;
use OpenEuropa\EPoetry\Notification\EPoetryNotificationClientFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Component\Yaml\Yaml;

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
     * @param string $filename
     *
     * @return array
     */
    public function getFixture(string $filename): array
    {
        return Yaml::parse($this->getFixtureContent($filename));
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    public function getFixtureContent(string $filename): string
    {
        return file_get_contents($filename);
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

    /**
     * Setup ePoetry notification client factory using HTTP mock client.
     *
     * @return \OpenEuropa\EPoetryNotification\EPoetryNotificationClientFactory
     */
    protected function createNotificationClientFactory(): EPoetryNotificationClientFactory
    {
        $wsdl = __DIR__ . '/../resources/EpoetryNotificationReceiverService.xml';

        return new EPoetryNotificationClientFactory($wsdl, $this->httpClient);
    }
}
