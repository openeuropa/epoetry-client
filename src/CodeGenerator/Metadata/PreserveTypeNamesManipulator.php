<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\CodeGenerator\Metadata;

use Phpro\SoapClient\Soap\Metadata\Manipulators\TypesManipulatorInterface;
use Soap\Engine\Metadata\Collection\PropertyCollection;
use Soap\Engine\Metadata\Collection\TypeCollection;
use Soap\Engine\Metadata\Model\Property;
use Soap\Engine\Metadata\Model\Type;

/**
 * Preserves v3 type names during v4 code generation.
 *
 * The v4 WSDL reader (php-soap/wsdl-reader) renames inline XSD complex
 * types by prepending the parent type name. For example, the `<contacts>`
 * element inside `<complexType name="requestDetailsIn">` becomes
 * `RequestDetailsInContacts` instead of the v3 name `Contacts`.
 *
 * This is a breaking change for library consumers who instantiate these
 * types directly (e.g. `new Contacts()`).
 *
 * This manipulator renames the v4 context-specific types back to the
 * shared v3 names. After renaming, the IntersectDuplicateTypesStrategy
 * (applied later in the chain) merges the resulting duplicate types.
 *
 * @see https://github.com/phpro/soap-client/blob/v4.x/UPGRADING.md
 */
class PreserveTypeNamesManipulator implements TypesManipulatorInterface
{
    /**
     * Maps v4 context-specific type names to v3 shared names.
     *
     * v4's wsdl-reader generates parent-prefixed names for inline
     * complex types. This map restores the original shared names
     * so that the generated PHP classes match the v3 public API.
     *
     * Keys and values use camelCase to match XSD element names as they
     * appear in the WSDL reader metadata. The code generator normalizes
     * these to PascalCase when generating PHP class names.
     *
     * Format: 'v4CamelCaseName' => 'v3CamelCaseName'
     */
    private const TYPE_NAME_MAP = [
        // Contacts: shared by requestDetailsIn, requestDetailsOut,
        // modifyRequestDetailsIn, and requestDetails.
        'requestDetailsInContacts' => 'contacts',
        'requestDetailsOutContacts' => 'contacts',
        'modifyRequestDetailsInContacts' => 'contacts',
        'requestDetailsContacts' => 'contacts',

        // Products: shared by requestDetailsIn, requestDetailsOut,
        // modifyRequestDetailsIn, and requestDetails.
        'requestDetailsInProducts' => 'products',
        'requestDetailsOutProducts' => 'products',
        'modifyRequestDetailsInProducts' => 'products',
        'requestDetailsProducts' => 'products',

        // LinguisticSections: shared by originalDocumentIn,
        // originalDocumentOut, and originalDocument.
        'originalDocumentInLinguisticSections' => 'linguisticSections',
        'originalDocumentOutLinguisticSections' => 'linguisticSections',
        'originalDocumentLinguisticSections' => 'linguisticSections',

        // InformativeMessages: shared by linguisticRequestOut
        // and linquisticRequest (note: "linquistic" is a typo in the WSDL).
        'linguisticRequestOutInformativeMessages' => 'informativeMessages',
        'linquisticRequestInformativeMessages' => 'informativeMessages',

        // AuxiliaryDocuments: used by requestDetailsOut.
        'requestDetailsOutAuxiliaryDocuments' => 'auxiliaryDocuments',

        // ReferenceDocuments: shared by auxiliaryDocumentsIn
        // and modifyAuxiliaryDocumentsIn.
        'auxiliaryDocumentsInReferenceDocuments' => 'referenceDocuments',
        'modifyAuxiliaryDocumentsInReferenceDocuments' => 'referenceDocuments',

        // TraxDocuments: shared by auxiliaryDocumentsIn
        // and modifyAuxiliaryDocumentsIn.
        'auxiliaryDocumentsInTraxDocuments' => 'traxDocuments',
        'modifyAuxiliaryDocumentsInTraxDocuments' => 'traxDocuments',

        // PrtDocuments: shared by auxiliaryDocumentsIn
        // and modifyAuxiliaryDocumentsIn.
        'auxiliaryDocumentsInPrtDocuments' => 'prtDocuments',
        'modifyAuxiliaryDocumentsInPrtDocuments' => 'prtDocuments',
    ];

    /**
     * Rename all types and their property type references.
     */
    public function __invoke(TypeCollection $types): TypeCollection
    {
        return new TypeCollection(
            ...array_map(
                fn (Type $type): Type => $this->renameType($type),
                iterator_to_array($types)
            )
        );
    }

    /**
     * Rename a type if it matches the map, and update its property
     * type references accordingly.
     */
    private function renameType(Type $type): Type
    {
        $originalName = $type->getName();
        $newName = self::TYPE_NAME_MAP[$originalName] ?? null;

        $xsdType = $type->getXsdType();
        if ($newName !== null) {
            $xsdType = $xsdType->copy($newName);
        }

        return new Type($xsdType, $this->renamePropertyTypes($type->getProperties()));
    }

    /**
     * Rename property type references that point to renamed types,
     * so generated code uses the correct class names.
     */
    private function renamePropertyTypes(PropertyCollection $properties): PropertyCollection
    {
        return new PropertyCollection(
            ...array_map(
                function (Property $prop): Property {
                    $propTypeName = $prop->getType()->getName();
                    $newName = self::TYPE_NAME_MAP[$propTypeName] ?? null;

                    if ($newName === null) {
                        return $prop;
                    }

                    return new Property(
                        $prop->getName(),
                        $prop->getType()->copy($newName)
                    );
                },
                iterator_to_array($properties)
            )
        );
    }
}
