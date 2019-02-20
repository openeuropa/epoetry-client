<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\PropertyInfo\Extractor;

use OpenEuropa\EPoetry\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Type\Contacts;
use OpenEuropa\EPoetry\Type\CreateRequests;
use OpenEuropa\EPoetry\Type\LinguisticRequestIn;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\Type;

/**
 * Class MappingReflectionExtractor.
 *
 * Make sure that the ReflectionExtractor object used in the serializer is
 * converting array of values into array of objects properly.
 */
class MappingReflectionExtractor extends ReflectionExtractor
{
    /**
     * The properties mapping list.
     *
     * Contains the list of properties that needs to be updated into
     * arrays of objects.
     *
     * The structure of the array is the following:
     *
     * $mapping[CLASS_NAME][PROPERTY => CLASS]
     *
     * @var array
     */
    public static $mapping = [
        Contacts::class => [
            'contact' => ContactPersonIn::class . '[]',
        ],
        CreateRequests::class => [
            'linguisticRequest' => LinguisticRequestIn::class . '[]',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function getTypes($class, $property, array $context = [])
    {
        foreach (self::$mapping as $parent => $data) {
            if (!is_a($class, $parent, true)) {
                continue;
            }

            foreach ($data as $data_property => $data_class) {
                if ($data_property !== $property) {
                    continue;
                }

                return [
                    new Type(Type::BUILTIN_TYPE_OBJECT, true, $data_class),
                ];
            }
        }

        return parent::getTypes($class, $property, $context);
    }
}
