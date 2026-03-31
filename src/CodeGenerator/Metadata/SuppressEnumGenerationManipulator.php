<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\CodeGenerator\Metadata;

use Phpro\SoapClient\Soap\Metadata\Manipulators\TypesManipulatorInterface;
use Soap\Engine\Metadata\Collection\PropertyCollection;
use Soap\Engine\Metadata\Collection\TypeCollection;
use Soap\Engine\Metadata\Model\Property;
use Soap\Engine\Metadata\Model\Type;
use Soap\Engine\Metadata\Model\TypeMeta;

/**
 * Suppresses PHP enum generation in phpro/soap-client v4.
 *
 * The v4 code generator creates PHP `enum` classes for XSD enumerations
 * (e.g. `enum Destination: string { case PUBLIC = 'PUBLIC'; ... }`).
 * This changes the public API: setters accept enum instances instead of
 * strings, breaking all library consumers.
 *
 * This manipulator strips the enum metadata from XSD types so the code
 * generator produces regular classes with string properties, preserving
 * backward compatibility.
 *
 * @see https://github.com/phpro/soap-client/blob/v4.x/UPGRADING.md
 */
class SuppressEnumGenerationManipulator implements TypesManipulatorInterface
{
    public function __invoke(TypeCollection $types): TypeCollection
    {
        return new TypeCollection(
            ...array_map(
                fn (Type $type): Type => new Type(
                    // Strip enum metadata at the TYPE level to prevent
                    // the code generator from creating PHP enum classes.
                    $type->getXsdType()->withMeta(
                        static fn (TypeMeta $meta): TypeMeta => $meta->withEnums(null)
                    ),
                    // Mark enum properties as "local" so the code generator:
                    // - Uses string type hints (not enum class references)
                    // - Preserves PHPDoc enum value hints ('XLS' | 'DOCX' | ...)
                    $this->markEnumPropertiesAsLocal($type->getProperties())
                ),
                iterator_to_array($types)
            )
        );
    }

    /**
     * Mark properties that reference enum types as "local" enums.
     *
     * The v4 code generator treats local and global enums differently:
     * - Global enum: type hint = enum class, PHPDoc = class name
     * - Local enum: type hint = string, PHPDoc = enum values
     *
     * By marking enum properties as local, we get string type hints
     * while preserving the allowed values in PHPDoc documentation.
     */
    private function markEnumPropertiesAsLocal(PropertyCollection $properties): PropertyCollection
    {
        return new PropertyCollection(
            ...array_map(
                static fn (Property $prop): Property => new Property(
                    $prop->getName(),
                    $prop->getType()->withMeta(
                        static fn (TypeMeta $meta): TypeMeta => $meta->enums()->isSome()
                            ? $meta->withIsLocal(true)
                            : $meta
                    )
                ),
                iterator_to_array($properties)
            )
        );
    }
}
