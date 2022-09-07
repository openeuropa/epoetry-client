<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer as SymfonyDateTimeNormalizer;

/**
 * Extension of Symfony's DateTimeNormalize class.
 */
class DateTimeNormalizer extends SymfonyDateTimeNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $type, $format = null, array $context = []): object
    {
        if ($type === \DateTimeInterface::class) {
            // Force to build \DateTime objects instead of \DateTimeImmutable.
            $type = \DateTime::class;
        }
        return parent::denormalize($data, $type, $format, $context);
    }
}
