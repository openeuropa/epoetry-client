<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use Monolog\Logger;
use OpenEuropa\EPoetry\Serializer\Serializer;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Base test class.
 */
abstract class BaseTest extends TestCase
{
    /**
     * @var Serializer
     */
    protected Serializer $serializer;

    /**
     * @var ExpressionLanguage
     */
    protected ExpressionLanguage $expressionLanguage;

    /**
     * @var ValidatorInterface
     */
    protected ValidatorInterface $validator;

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->serializer = new Serializer();
        $this->logger = new Logger('test');

        // Setup expression language service.
        $this->expressionLanguage = new ExpressionLanguage();
        $this->expressionLanguage->addFunction(ExpressionFunction::fromPhp('count'));
        $this->expressionLanguage->addFunction(ExpressionFunction::fromPhp('is_a'));
        $this->expressionLanguage->addFunction(ExpressionFunction::fromPhp('strpos'));

        parent::setUp();
    }

    /**
     * Gets parsed fixture content.
     *
     * @param string $filename
     *
     * @return array
     */
    public function getFixture(string $filename, $dir = ''): array
    {
        return Yaml::parse(file_get_contents(__DIR__ . $dir .  '/fixtures/' . $filename));
    }

    /**
     * Assert a list of Expression Language expressions.
     *
     * @param array $expressions
     * @param array $values
     */
    protected function assertExpressionLanguageExpressions(array $expressions, array $values): void
    {
        foreach ($expressions as $expression) {
            static::assertTrue(
                $this->expressionLanguage->evaluate(
                    $expression,
                    $values
                ),
                sprintf('The expression [%s] failed to evaluate to true.', $expression)
            );
        }
    }

    /**
     * Get a non-accessible method on given class, so it can be unit-tested.
     *
     * @param string $class
     * @param string $name
     *
     * @return \ReflectionMethod
     * @throws \ReflectionException
     */
    protected function getMethod(string $class, string $name): \ReflectionMethod
    {
        $class = new \ReflectionClass($class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
}
