<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer;

use Doctrine\Common\Annotations\AnnotationReader;
use OpenEuropa\EPoetry\Serializer\Normalizer\ContactsDenormalizer;
use OpenEuropa\EPoetry\Serializer\Normalizer\DateTimeNormalizer;
use OpenEuropa\EPoetry\Serializer\Normalizer\DateTimeNormalizer4;
use OpenEuropa\EPoetry\Serializer\Normalizer\ObjectNormalizer;
use OpenEuropa\EPoetry\Serializer\Normalizer\LinguisticSectionsDenormalizer;
use OpenEuropa\EPoetry\Serializer\Normalizer\ProductsDenormalizer;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

/**
 * Class Serializer.
 *
 * This class has basic definitions for serializers.
 * By default you can serialize request from XML or YAML files.
 */
class Serializer implements SerializerInterface
{
    /**
     * {@inheritdoc}
     */
    public function deserialize($data, $type, $format, array $context = []): object|array
    {
        return $this->getSerializer()->deserialize($data, $type, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($data, $format, array $context = []): string
    {
        return $this->getSerializer()->serialize($data, $format, $context);
    }

    /**
     * Convert a PHP array into an object.
     *
     * @param array $input
     *   The PHP array
     * @param string $type
     *   The object type
     *
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     *
     * @return object
     *   The new object
     */
    public function fromArray(array $input, string $type): object
    {
        return $this->getSerializer()->denormalize($input, $type);
    }

    /**
     * Convert an object into PHP array.
     *
     * @param object $data
     */
    public function toArray(object $data): array
    {
        return $this->getSerializer()->normalize($data);
    }

    /**
     * Convert a string into an object.
     *
     * @param string $data
     *   The input string
     * @param string $type
     *   The object type
     * @param string $format
     *   The string format (yml, json, xml...)
     *
     * @return object
     *   The new object
     */
    public function fromString(string $data, string $type, string $format): object
    {
        return $this->deserialize($data, $type, $format);
    }

    /**
     * Convert object to the string of specific format.
     *
     * @param object $data
     *   The object type
     * @param string $format
     *   Format of the string
     *
     * @return string
     *   Result string
     */
    public function toString(object $data, string $format): string
    {
        return $this->serialize($data, $format);
    }

    /**
     * Serializer constructor.
     *
     * @param \Symfony\Component\Serializer\Encoder\EncoderInterface[] $encoders
     *
     * @return \Symfony\Component\Serializer\Serializer
     */
    protected function getSerializer(array $encoders = []): SymfonySerializer
    {
        if ($encoders === []) {
            $encoders = [
                new XmlEncoder(),
                new JsonEncoder(),
                new YamlEncoder(),
            ];
        }

        // Setup serializer service.
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $context = [
            AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true, // Allow to set integer values from strings.
            AbstractObjectNormalizer::SKIP_NULL_VALUES => true, // Null values won't be generated.
        ];

        return new SymfonySerializer([
            // @todo When support for Symfony 4 will be dropped, two things
            // needs to be done:
            // 1. The `DateTimeNormalizer4` class needs to be deleted
            // 2. The next line needs to be rewritten accordingly.
            (5 >= Kernel::MAJOR_VERSION ? new DateTimeNormalizer4() : new DateTimeNormalizer()),
            new ArrayDenormalizer(),
            new ProductsDenormalizer(),
            new LinguisticSectionsDenormalizer(),
            new ContactsDenormalizer(),
            new ObjectNormalizer(
                $classMetadataFactory,
                null,
                null,
                new PhpDocExtractor(),
                null,
                null,
                $context
            )
        ], $encoders);
    }
}
