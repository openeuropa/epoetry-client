<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer\Normalizer;

use DateTimeInterface;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer as SymfonyDateTimeNormalizer;

/**
 * Extension of Symfony's DateTimeNormalize class, only for Symfony 4.
 *
 * @todo When support for Symfony 4 will be dropped, this class needs to be
 *       deleted.
*/
class DateTimeNormalizer4 extends SymfonyDateTimeNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $type, $format = null, array $context = []): DateTimeInterface
    {
        if ($type === \DateTimeInterface::class) {
            // Force to build \DateTime objects instead of \DateTimeImmutable.
            $type = \DateTime::class;
        }
        return parent::denormalize($data, $type, $format, $context);
    }
}
