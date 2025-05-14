<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer as SymfonyObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;

/**
 * Extension of Symfony's ObjectNormalize class.
 */
class ObjectNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
    public function __construct(private readonly SymfonyObjectNormalizer $objectNormalizer)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $type, $format = null, array $context = []): object
    {
        // Save parent types to the context to be available in other denormalizers.
        if (!isset($context['parent_types'])) {
            $context['parent_types'] = [];
        }
        $context['parent_types'][] = $type;

        if (is_array($data)) {
            // Handle properties which could have boolean value.
            $boolean_properties =  preg_grep('/^is[A-Z]/', get_class_methods($type));
            array_walk($boolean_properties, function (&$value) {
                $value = lcfirst(substr($value, 2));
            });
            foreach (array_keys($data) as $key) {
                if (in_array($key, $boolean_properties) && is_string($data[$key])) {
                    $data[$key] = filter_var($data[$key], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
                }
            }
        }
        // Cast empty string to null to ensure $data is denormalized correctly.
        $data = ($data === '') ? null : $data;

        return $this->objectNormalizer->denormalize($data, $type, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportedTypes(...$args): array
    {
        return $this->objectNormalizer->getSupportedTypes(...$args);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization(...$args): bool
    {
        return $this->objectNormalizer->supportsDenormalization(...$args);
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(...$args): array|string|int|float|bool|\ArrayObject|null
    {
        return $this->objectNormalizer->normalize(...$args);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization(...$args): bool
    {
        return $this->objectNormalizer->supportsNormalization(...$args);
    }

    /**
     * {@inheritdoc}
     */
    public function setSerializer(...$args): void
    {
        $this->objectNormalizer->setSerializer(...$args);
    }
}
