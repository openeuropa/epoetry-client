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
 * The WSDL/XSD files in resources/ are third-party artifacts that we
 * store as-is, so we solve the naming mismatch here rather than
 * modifying the schema.
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
     * Format: 'V4ContextSpecificName' => 'V3SharedName'
     */
    private const TYPE_NAME_MAP = [
        // Contacts: shared by RequestDetailsIn, RequestDetailsOut,
        // ModifyRequestDetailsIn, and RequestDetails.
        'RequestDetailsInContacts' => 'Contacts',
        'RequestDetailsOutContacts' => 'Contacts',
        'ModifyRequestDetailsInContacts' => 'Contacts',
        'RequestDetailsContacts' => 'Contacts',

        // Products: shared by RequestDetailsIn, RequestDetailsOut,
        // ModifyRequestDetailsIn, and RequestDetails.
        'RequestDetailsInProducts' => 'Products',
        'RequestDetailsOutProducts' => 'Products',
        'ModifyRequestDetailsInProducts' => 'Products',
        'RequestDetailsProducts' => 'Products',

        // LinguisticSections: shared by OriginalDocumentIn,
        // OriginalDocumentOut, and OriginalDocument.
        'OriginalDocumentInLinguisticSections' => 'LinguisticSections',
        'OriginalDocumentOutLinguisticSections' => 'LinguisticSections',
        'OriginalDocumentLinguisticSections' => 'LinguisticSections',

        // InformativeMessages: shared by LinguisticRequestOut
        // and LinquisticRequest (note: "Linquistic" is a typo in the WSDL).
        'LinguisticRequestOutInformativeMessages' => 'InformativeMessages',
        'LinquisticRequestInformativeMessages' => 'InformativeMessages',

        // AuxiliaryDocuments: used by RequestDetailsOut.
        'RequestDetailsOutAuxiliaryDocuments' => 'AuxiliaryDocuments',

        // ReferenceDocuments: shared by AuxiliaryDocumentsIn
        // and ModifyAuxiliaryDocumentsIn.
        'AuxiliaryDocumentsInReferenceDocuments' => 'ReferenceDocuments',
        'ModifyAuxiliaryDocumentsInReferenceDocuments' => 'ReferenceDocuments',

        // TraxDocuments: shared by AuxiliaryDocumentsIn
        // and ModifyAuxiliaryDocumentsIn.
        'AuxiliaryDocumentsInTraxDocuments' => 'TraxDocuments',
        'ModifyAuxiliaryDocumentsInTraxDocuments' => 'TraxDocuments',

        // PrtDocuments: shared by AuxiliaryDocumentsIn
        // and ModifyAuxiliaryDocumentsIn.
        'AuxiliaryDocumentsInPrtDocuments' => 'PrtDocuments',
        'ModifyAuxiliaryDocumentsInPrtDocuments' => 'PrtDocuments',
    ];

    public function __invoke(TypeCollection $types): TypeCollection
    {
        return new TypeCollection(
            ...array_map(
                fn (Type $type): Type => $this->renameType($type),
                iterator_to_array($types)
            )
        );
    }

    private function renameType(Type $type): Type
    {
        $originalName = $type->getName();
        $newName = self::TYPE_NAME_MAP[$originalName] ?? null;

        $xsdType = $type->getXsdType();
        if ($newName !== null) {
            $xsdType = $xsdType->copy($newName);
        }

        // Also rename property type references so that properties
        // pointing to renamed types get the correct class name.
        return new Type($xsdType, $this->renamePropertyTypes($type->getProperties()));
    }

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
