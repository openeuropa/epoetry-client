<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer;

use OpenEuropa\EPoetry\PropertyInfo\Extractor\MappingReflectionExtractor;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AbstractSerializer.
 *
 * This class has basic definitions for serializers.
 * By default you can serialize request from XML or YAML files.
 */
abstract class AbstractSerializer implements SerializerInterface
{
    /**
     * The serializer.
     *
     * @var \Symfony\Component\Serializer\Serializer
     */
    protected $serializer;

    /**
     * RequestsSerializer constructor.
     *
     * @param \Symfony\Component\Serializer\Encoder\EncoderInterface[] $encoders
     */
    public function __construct(array $encoders = [])
    {
        if ($encoders === []) {
            $encoders = [
                new XmlEncoder(),
                new YamlEncoder(),
            ];
        }

        $this->serializer = new Serializer(
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
    public function deserialize($data, $type, $format, array $context = [])
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($data, $format, array $context = [])
    {
        return $this->serializer->serialize($data, $format, $context);
    }
}
