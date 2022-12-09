<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Serializer\Normalizer;

use OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsOut;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\ProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\ProductRequestOut;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;
use Symfony\Component\Serializer\SerializerAwareInterface;

/**
 * Denormalizer for OpenEuropa\EPoetry\Request\Type\Products class.
 *
 * Separate denormalizer is required since 'product' property can include objects of different types, so need to provide
 * a rule how to denormalize object correctly.
 */
class ProductsDenormalizer implements DenormalizerInterface, SerializerAwareInterface
{
    use SerializerAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $type, $format = null, array $context = []): ?object
    {
        if (empty($data['product'])) {
            return null;
        }

        // Define product class based on the class of the parent object.
        $mapping = [
            RequestDetailsIn::class => ProductRequestIn::class,
            RequestDetailsOut::class => ProductRequestOut::class,
        ];

        // Parent types in $context['parent_types'] are set in ObjectNormalizer.
        $childType = ModifyProductRequestIn::class;
        foreach ($mapping as $parentType => $value) {
            if (in_array($parentType, $context['parent_types'])) {
                $childType = $value;
                break;
            }
        }

        $products = new Products();
        $values = $data['product'];
        if (!isset($data['product'][0])) {
            // Single value in XML.
            $values = [
                $data['product'],
            ];
        }
        foreach ($values as $value) {
            $product = $this->serializer->denormalize($value, $childType, $format, $context);
            $products->addProduct($product);
        }

        return $products;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Products::class;
    }
}
