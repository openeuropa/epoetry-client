<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer;

use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * This class is the default notification serializer.
 *
 * The class is final to ensure that you use composition over inheritance in
 * your project.
 */
final class NotificationSerializer extends AbstractSerializer implements SerializerInterface
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
     * @return ReceiveNotification
     *   The new object
     */
    public static function fromArray(array $input, string $type): ReceiveNotification
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
     * @return ReceiveNotification
     *   The new object
     */
    public static function fromFile(string $filepath, string $type, string $format): ReceiveNotification
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
     * @return ReceiveNotification
     *   The new object
     */
    public static function fromString(string $data, string $type, string $format): ReceiveNotification
    {
        $instance = new self();

        return $instance->deserialize($data, $type, $format);
    }
}
