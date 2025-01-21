<?php

namespace OpenEuropa\EPoetry\Request;

use OpenEuropa\EPoetry\Request\Type;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMapCollection;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMap;

class RequestClassmap
{
    public static function getCollection() : \Soap\ExtSoapEngine\Configuration\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
            new ClassMap('addNewPartToDossier', Type\AddNewPartToDossier::class),
            new ClassMap('addNewPartToDossierResponse', Type\AddNewPartToDossierResponse::class),
            new ClassMap('createCorrectionRequest', Type\CreateCorrectionRequest::class),
            new ClassMap('createCorrectionRequestResponse', Type\CreateCorrectionRequestResponse::class),
            new ClassMap('createLinguisticRequest', Type\CreateLinguisticRequest::class),
            new ClassMap('createLinguisticRequestResponse', Type\CreateLinguisticRequestResponse::class),
            new ClassMap('createNewVersion', Type\CreateNewVersion::class),
            new ClassMap('createNewVersionResponse', Type\CreateNewVersionResponse::class),
            new ClassMap('getLinguisticRequest', Type\GetLinguisticRequest::class),
            new ClassMap('getLinguisticRequestResponse', Type\GetLinguisticRequestResponse::class),
            new ClassMap('modifyLinguisticRequest', Type\ModifyLinguisticRequest::class),
            new ClassMap('modifyLinguisticRequestResponse', Type\ModifyLinguisticRequestResponse::class),
            new ClassMap('NoSuchMethodException', Type\NoSuchMethodException::class),
            new ClassMap('resubmitRequest', Type\ResubmitRequest::class),
            new ClassMap('resubmitRequestResponse', Type\ResubmitRequestResponse::class),
            new ClassMap('UnsupportedEncodingException', Type\UnsupportedEncodingException::class),
            new ClassMap('updateCallbackUrl', Type\UpdateCallbackUrl::class),
            new ClassMap('updateCallbackUrlResponse', Type\UpdateCallbackUrlResponse::class),
            new ClassMap('dossierReference', Type\DossierReference::class),
            new ClassMap('requestDetailsIn', Type\RequestDetailsIn::class),
            new ClassMap('contacts', Type\Contacts::class),
            new ClassMap('products', Type\Products::class),
            new ClassMap('contactPersonIn', Type\ContactPersonIn::class),
            new ClassMap('originalDocumentIn', Type\OriginalDocumentIn::class),
            new ClassMap('linguisticSections', Type\LinguisticSections::class),
            new ClassMap('linguisticSectionIn', Type\LinguisticSectionIn::class),
            new ClassMap('productRequestIn', Type\ProductRequestIn::class),
            new ClassMap('auxiliaryDocumentsIn', Type\AuxiliaryDocumentsIn::class),
            new ClassMap('referenceDocuments', Type\ReferenceDocuments::class),
            new ClassMap('traxDocuments', Type\TraxDocuments::class),
            new ClassMap('prtDocuments', Type\PrtDocuments::class),
            new ClassMap('documentIn', Type\DocumentIn::class),
            new ClassMap('srcDocumentIn', Type\SrcDocumentIn::class),
            new ClassMap('linguisticRequestOut', Type\LinguisticRequestOut::class),
            new ClassMap('informativeMessages', Type\InformativeMessages::class),
            new ClassMap('requestReferenceOut', Type\RequestReferenceOut::class),
            new ClassMap('requestDetailsOut', Type\RequestDetailsOut::class),
            new ClassMap('auxiliaryDocuments', Type\AuxiliaryDocuments::class),
            new ClassMap('contactPersonOut', Type\ContactPersonOut::class),
            new ClassMap('originalDocumentOut', Type\OriginalDocumentOut::class),
            new ClassMap('linguisticSectionOut', Type\LinguisticSectionOut::class),
            new ClassMap('productRequestOut', Type\ProductRequestOut::class),
            new ClassMap('auxiliaryDocumentOut', Type\AuxiliaryDocumentOut::class),
            new ClassMap('correctionDetailsIn', Type\CorrectionDetailsIn::class),
            new ClassMap('correctionReferenceIn', Type\CorrectionReferenceIn::class),
            new ClassMap('requestReferenceIn', Type\RequestReferenceIn::class),
            new ClassMap('correctionRequestOut', Type\CorrectionRequestOut::class),
            new ClassMap('dcoOut', Type\DcoOut::class),
            new ClassMap('linguisticRequestIn', Type\LinguisticRequestIn::class),
            new ClassMap('modifyLinguisticRequestIn', Type\ModifyLinguisticRequestIn::class),
            new ClassMap('modifyRequestReferenceIn', Type\ModifyRequestReferenceIn::class),
            new ClassMap('modifyRequestDetailsIn', Type\ModifyRequestDetailsIn::class),
            new ClassMap('modifyProductRequestIn', Type\ModifyProductRequestIn::class),
            new ClassMap('modifyAuxiliaryDocumentsIn', Type\ModifyAuxiliaryDocumentsIn::class),
            new ClassMap('updateCallbackUrlOut', Type\UpdateCallbackUrlOut::class),
        );
    }
}

