<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer as SymfonyObjectNormalizer;

/**
 * Extension of Symfony's ObjectNormalize class.
 */
class ObjectNormalizer extends SymfonyObjectNormalizer
{
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

        return parent::denormalize($data, $type, $format, $context);
    }
}
