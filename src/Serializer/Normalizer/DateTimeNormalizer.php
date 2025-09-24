<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer as SymfonyDateTimeNormalizer;

/**
 * Decorate Symfony DateTimeNormalizer.
 */
class DateTimeNormalizer implements NormalizerInterface, DenormalizerInterface
{
    public function __construct(private readonly SymfonyDateTimeNormalizer $dateTimeNormalizer)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): \DateTimeInterface
    {
        if ($type === \DateTimeInterface::class) {
            // Force to build \DateTime objects instead of \DateTimeImmutable.
            $type = \DateTime::class;
        }
        return $this->dateTimeNormalizer->denormalize($data, $type, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization(...$args): bool
    {
        return $this->dateTimeNormalizer->supportsDenormalization(...$args);
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(...$args): array|string|int|float|bool|\ArrayObject|null
    {
        return $this->dateTimeNormalizer->normalize(...$args);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization(...$args): bool
    {
        return $this->dateTimeNormalizer->supportsNormalization(...$args);
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportedTypes(...$args): array
    {
        return $this->dateTimeNormalizer->getSupportedTypes(...$args);
    }
}
