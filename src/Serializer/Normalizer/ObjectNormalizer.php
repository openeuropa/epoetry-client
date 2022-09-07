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

        return parent::denormalize($data, $type, $format, $context);
    }
}
