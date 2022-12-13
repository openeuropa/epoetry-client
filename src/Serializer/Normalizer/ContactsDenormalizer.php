<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer\Normalizer;

use OpenEuropa\EPoetry\Request\Type\ContactPersonOut;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsOut;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;
use Symfony\Component\Serializer\SerializerAwareInterface;

/**
 * Denormalizer for OpenEuropa\EPoetry\Request\Type\Contacts class.
 *
 * Separate denormalizer is required since 'contacts' property can include objects of
 * ContactPersonOut or ContactPersonIn types, so need to provide a rule how to denormalize object correctly.
 */
class ContactsDenormalizer implements DenormalizerInterface, SerializerAwareInterface
{
    use SerializerAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $type, $format = null, array $context = []): ?object
    {
        if (empty($data['contact'])) {
            return null;
        }

        // Parent types in $context['parent_types'] are set in ObjectNormalizer.
        $childType = ContactPersonIn::class;
        if (in_array(RequestDetailsOut::class, $context['parent_types'])) {
            $childType = ContactPersonOut::class;
        }

        $contacts = new Contacts();
        $values = $data['contact'];
        if (!isset($data['contact'][0])) {
            // Single value in XML.
            $values = [
                $data['contact'],
            ];
        }

        $attributes = ['userId', 'contactRole'];
        foreach ($values as $value) {
            // Copy attributes to values.
            foreach ($attributes as $attribute) {
                $name = '@' . $attribute;
                if (isset($value[$name])) {
                    $value[$attribute] = $value[$name];
                    unset($value[$name]);
                }
            }
            if (isset($value['#'])) {
                unset($value['#']);
            }

            // Create objects.
            $contact = $this->serializer->denormalize($value, $childType, $format, $context);
            $contacts->addContact($contact);
        }

        return $contacts;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Contacts::class;
    }
}
