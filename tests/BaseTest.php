<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
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
    protected $serializer;

    /**
     * @var ExpressionLanguage
     */
    protected $expressionLanguage;

    /**
     * @var ValidatorInterface
     */
    protected ValidatorInterface $validator;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        // Setup serializer service.
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizers = [new DateTimeNormalizer(), new ArrayDenormalizer()];
        $normalizers[] = new ObjectNormalizer($classMetadataFactory, null, null, new PhpDocExtractor(), null, null, [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true]);
        $this->serializer = new Serializer($normalizers, [new XmlEncoder()]);

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
}
