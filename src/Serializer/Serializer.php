<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer;

use OpenEuropa\EPoetry\PropertyInfo\Extractor\MappingReflectionExtractor;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AbstractSerializer.
 *
 * This class has basic definitions for serializers.
 * By default you can serialize request from XML or YAML files.
 */
class Serializer implements SerializerInterface
{
    /**
     * {@inheritdoc}
     */
    public function deserialize($data, $type, $format, array $context = [])
    {
        return self::getSerializer()->deserialize($data, $type, $format, $context);
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
     * @return RequestInterface
     *   The new object
     */
    public static function fromArray(array $input, string $type)
    {
        return self::getSerializer()->denormalize($input, $type);
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
     * @return RequestInterface
     *   The new object
     */
    public static function fromString(string $data, string $type, string $format)
    {
        return self::getSerializer()->deserialize($data, $type, $format);
    }
    /**
     * RequestsSerializer constructor.
     *
     * @param \Symfony\Component\Serializer\Encoder\EncoderInterface[] $encoders
     *
     * @return \Symfony\Component\Serializer\Serializer
     */
    public static function getSerializer(array $encoders = [])
    {
        if ($encoders === []) {
            $encoders = [
                new XmlEncoder(),
                new YamlEncoder(),
            ];
        }

        return new SymfonySerializer(
            [
                new ArrayDenormalizer(),
                new ObjectNormalizer(
                    null,
                    new CamelCaseToSnakeCaseNameConverter(),
                    null,
                    new MappingReflectionExtractor()
                ),
            ],
            $encoders
        );
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($data, $format, array $context = [])
    {
        return self::getSerializer()->serialize($data, $format, $context);
    }
}
