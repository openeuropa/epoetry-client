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
                    $this->stripEnumMeta($type->getXsdType()),
                    $this->stripEnumMetaFromProperties($type->getProperties())
                ),
                iterator_to_array($types)
            )
        );
    }

    /**
     * Remove enum metadata from an XSD type so the code generator
     * treats it as a regular class instead of a PHP enum.
     */
    private function stripEnumMeta(\Soap\Engine\Metadata\Model\XsdType $xsdType): \Soap\Engine\Metadata\Model\XsdType
    {
        return $xsdType->withMeta(
            static fn (TypeMeta $meta): TypeMeta => $meta->withEnums(null)
        );
    }

    /**
     * Remove enum metadata from all property types within a type,
     * so properties that reference enum types keep string signatures.
     */
    private function stripEnumMetaFromProperties(PropertyCollection $properties): PropertyCollection
    {
        return new PropertyCollection(
            ...array_map(
                fn (Property $prop): Property => new Property(
                    $prop->getName(),
                    $this->stripEnumMeta($prop->getType())
                ),
                iterator_to_array($properties)
            )
        );
    }
}
