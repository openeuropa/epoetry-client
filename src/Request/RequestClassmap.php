<?php

namespace OpenEuropa\EPoetry\Request;

use OpenEuropa\EPoetry\Request\Type;
use Soap\Encoding\ClassMap\ClassMapCollection;
use Soap\Encoding\ClassMap\ClassMap;

class RequestClassmap
{
    public static function types(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'addNewPartToDossier', Type\AddNewPartToDossier::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'addNewPartToDossierResponse', Type\AddNewPartToDossierResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createCorrectionRequest', Type\CreateCorrectionRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createCorrectionRequestResponse', Type\CreateCorrectionRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createLinguisticRequest', Type\CreateLinguisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createLinguisticRequestResponse', Type\CreateLinguisticRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createNewVersion', Type\CreateNewVersion::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createNewVersionResponse', Type\CreateNewVersionResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'getLinguisticRequest', Type\GetLinguisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'getLinguisticRequestResponse', Type\GetLinguisticRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyLinguisticRequest', Type\ModifyLinguisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyLinguisticRequestResponse', Type\ModifyLinguisticRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'NoSuchMethodException', Type\NoSuchMethodException::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'resubmitRequest', Type\ResubmitRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'resubmitRequestResponse', Type\ResubmitRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'UnsupportedEncodingException', Type\UnsupportedEncodingException::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'updateCallbackUrl', Type\UpdateCallbackUrl::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'updateCallbackUrlResponse', Type\UpdateCallbackUrlResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dossierReference', Type\DossierReference::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestDetailsIn', Type\RequestDetailsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'contacts', Type\Contacts::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'products', Type\Products::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'contactPersonIn', Type\ContactPersonIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'originalDocumentIn', Type\OriginalDocumentIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticSections', Type\LinguisticSections::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticSectionIn', Type\LinguisticSectionIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'productRequestIn', Type\ProductRequestIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'auxiliaryDocumentsIn', Type\AuxiliaryDocumentsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'referenceDocuments', Type\ReferenceDocuments::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'traxDocuments', Type\TraxDocuments::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'prtDocuments', Type\PrtDocuments::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'documentIn', Type\DocumentIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'srcDocumentIn', Type\SrcDocumentIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticRequestOut', Type\LinguisticRequestOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'informativeMessages', Type\InformativeMessages::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestReferenceOut', Type\RequestReferenceOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestDetailsOut', Type\RequestDetailsOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'auxiliaryDocuments', Type\AuxiliaryDocuments::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'contactPersonOut', Type\ContactPersonOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'originalDocumentOut', Type\OriginalDocumentOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticSectionOut', Type\LinguisticSectionOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'productRequestOut', Type\ProductRequestOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'auxiliaryDocumentOut', Type\AuxiliaryDocumentOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'correctionDetailsIn', Type\CorrectionDetailsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'correctionReferenceIn', Type\CorrectionReferenceIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestReferenceIn', Type\RequestReferenceIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'correctionRequestOut', Type\CorrectionRequestOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dcoOut', Type\DcoOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticRequestIn', Type\LinguisticRequestIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyLinguisticRequestIn', Type\ModifyLinguisticRequestIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyRequestReferenceIn', Type\ModifyRequestReferenceIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyRequestDetailsIn', Type\ModifyRequestDetailsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyProductRequestIn', Type\ModifyProductRequestIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyAuxiliaryDocumentsIn', Type\ModifyAuxiliaryDocumentsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'updateCallbackUrlOut', Type\UpdateCallbackUrlOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dossier', Type\Dossier::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestDetails', Type\RequestDetails::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'originalDocument', Type\OriginalDocument::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticSection', Type\LinguisticSection::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'product', Type\Product::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linquisticRequest', Type\LinquisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestReference', Type\RequestReference::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'contactPerson', Type\ContactPerson::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'DCO', Type\DCO::class),
        );
    }

    public static function enums(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
        );
    }
}
