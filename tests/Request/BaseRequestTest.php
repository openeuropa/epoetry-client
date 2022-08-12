<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Doctrine\Common\Annotations\AnnotationReader;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use PHPUnit\Framework\TestCase;
use Soap\Engine\Driver;
use Soap\ExtSoapEngine\AbusedClient;
use Soap\ExtSoapEngine\ExtSoapDriver;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder;
use Symfony\Component\Yaml\Yaml;

/**
 * Base test class for the "Request" ePoetry service.
 */
abstract class BaseRequestTest extends TestCase
{
    protected Driver $driver;

    protected ValidatorInterface $validator;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var ExpressionLanguage
     */
    protected $expressionLanguage;

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

        // Setup serializer service.
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizers = [new DateTimeNormalizer(), new ArrayDenormalizer()];
        $normalizers[] = new ObjectNormalizer($classMetadataFactory, null, null, new PhpDocExtractor());
        $this->serializer = new Serializer($normalizers);

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
    public function getFixture(string $filename): array
    {
        return Yaml::parse(file_get_contents(__DIR__ . '/fixtures/' . $filename));
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
