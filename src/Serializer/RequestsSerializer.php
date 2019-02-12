<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer;

use OpenEuropa\EPoetry\PropertyInfo\Extractor\MappingReflectionExtractor;

use OpenEuropa\EPoetry\Type\CreateRequests;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class RequestsSerializer.
 *
 * This class is the default request serializer.
 *
 * By default you can serialize request from XML or YAML files.
 *
 * The class is final to ensure that you use composition over inheritance in
 * your project.
 */
final class RequestsSerializer implements SerializerInterface
{
    /**
     * The serializer.
     *
     * @var \Symfony\Component\Serializer\Serializer
     */
    private $serializer;

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
     * Convert a PHP array into an object.
     *
     * @param array $input
     *   The PHP array
     * @param string $type
     *   The object type
     *
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     *
     * @return CreateRequests
     *   The new object
     */
    public static function fromArray(array $input, string $type): CreateRequests
    {
        $instance = new self();

        return $instance->serializer->denormalize($input, $type);
    }

    /**
     * Convert a string into an object.
     *
     * @param string $filepath
     *   The file path
     * @param string $type
     *   The object type
     * @param string $format
     *   The string format (yml, json, xml...)
     *
     * @return CreateRequests
     *   The new object
     */
    public static function fromFile(string $filepath, string $type, string $format): CreateRequests
    {
        return self::fromString(file_get_contents($filepath), $type, $format);
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
     * @return CreateRequests
     *   The new object
     */
    public static function fromString(string $data, string $type, string $format): CreateRequests
    {
        $instance = new self();

        return $instance->deserialize($data, $type, $format);
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($data, $format, array $context = [])
    {
        return $this->serializer->serialize($data, $format, $context);
    }
}
