<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer\Normalizer;

use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionIn;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;
use Symfony\Component\Serializer\SerializerAwareInterface;

/**
 * Denormalizer for OpenEuropa\EPoetry\Request\Type\LinguisticSections class.
 *
 * Separate denormalizer is required since 'linguisticSection' property can include objects of
 * LinguisticSectionOut or LinguisticSectionIn types, so need to provide a rule how to denormalize object correctly.
 */
class LinguisticSectionsDenormalizer implements DenormalizerInterface, SerializerAwareInterface
{
    use SerializerAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $type, $format = null, array $context = []): ?object
    {
        if (empty($data['linguisticSection'])) {
            return null;
        }

        // Parent types in $context['parent_types'] are set in ObjectNormalizer.
        $childType = LinguisticSectionOut::class;
        if (in_array(OriginalDocumentIn::class, $context['parent_types'])) {
            $childType = LinguisticSectionIn::class;
        }

        $values = $innerArray = $data['linguisticSection'];
        if (isset($innerArray['language'])) {
            $values = [];
            // Denormalization from XML.
            if (is_array($innerArray['language'])) {
                // Multiple values in XML.
                foreach ($innerArray['language'] as $value) {
                    $values[] = ['language' => $value];
                }
            } else {
                // Single value in XML.
                $values[] = $innerArray;
            }
        }

        $linguisticSections = new LinguisticSections();
        foreach ($values as $value) {
            $linguisticSection = $this->serializer->denormalize($value, $childType, $format, $context);
            $linguisticSections->addLinguisticSection($linguisticSection);
        }

        return $linguisticSections;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === LinguisticSections::class;
    }
}
