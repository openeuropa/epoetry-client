<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer;

use OpenEuropa\EPoetry\Request\Type\CreateRequests;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

/**
 * Class RequestsSerializer.
 *
 * This class is the default request serializer.
 *
 * The class is final to ensure that you use composition over inheritance in
 * your project.
 */
final class RequestsSerializer extends AbstractSerializer implements SerializerInterface
{
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
        if (!file_exists($filepath)) {
            throw new NotFoundResourceException(sprintf('File "%s" not found.', $filepath));
        }

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
}
