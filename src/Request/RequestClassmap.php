<?php

namespace OpenEuropa\EPoetry\Request;

use Soap\Encoding\ClassMap\ClassMapCollection;
use Soap\Encoding\ClassMap\ClassMap;

class RequestClassmap
{
    public static function types(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'addNewPartToDossier', \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'addNewPartToDossierResponse', \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossierResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createCorrectionRequest', \OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createCorrectionRequestResponse', \OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createLinguisticRequest', \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createLinguisticRequestResponse', \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createNewVersion', \OpenEuropa\EPoetry\Request\Type\CreateNewVersion::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'createNewVersionResponse', \OpenEuropa\EPoetry\Request\Type\CreateNewVersionResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'getLinguisticRequest', \OpenEuropa\EPoetry\Request\Type\GetLinguisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'getLinguisticRequestResponse', \OpenEuropa\EPoetry\Request\Type\GetLinguisticRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyLinguisticRequest', \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyLinguisticRequestResponse', \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'NoSuchMethodException', \OpenEuropa\EPoetry\Request\Type\NoSuchMethodException::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'resubmitRequest', \OpenEuropa\EPoetry\Request\Type\ResubmitRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'resubmitRequestResponse', \OpenEuropa\EPoetry\Request\Type\ResubmitRequestResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'UnsupportedEncodingException', \OpenEuropa\EPoetry\Request\Type\UnsupportedEncodingException::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'updateCallbackUrl', \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrl::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'updateCallbackUrlResponse', \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dossierReference', \OpenEuropa\EPoetry\Request\Type\DossierReference::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestDetailsIn', \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'contacts', \OpenEuropa\EPoetry\Request\Type\Contacts::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'products', \OpenEuropa\EPoetry\Request\Type\Products::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'contactPersonIn', \OpenEuropa\EPoetry\Request\Type\ContactPersonIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'originalDocumentIn', \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticSections', \OpenEuropa\EPoetry\Request\Type\LinguisticSections::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticSectionIn', \OpenEuropa\EPoetry\Request\Type\LinguisticSectionIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'productRequestIn', \OpenEuropa\EPoetry\Request\Type\ProductRequestIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'auxiliaryDocumentsIn', \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'referenceDocuments', \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'traxDocuments', \OpenEuropa\EPoetry\Request\Type\TraxDocuments::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'prtDocuments', \OpenEuropa\EPoetry\Request\Type\PrtDocuments::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'documentIn', \OpenEuropa\EPoetry\Request\Type\DocumentIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'srcDocumentIn', \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticRequestOut', \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'informativeMessages', \OpenEuropa\EPoetry\Request\Type\InformativeMessages::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestReferenceOut', \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestDetailsOut', \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'auxiliaryDocuments', \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'contactPersonOut', \OpenEuropa\EPoetry\Request\Type\ContactPersonOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'originalDocumentOut', \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticSectionOut', \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'productRequestOut', \OpenEuropa\EPoetry\Request\Type\ProductRequestOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'auxiliaryDocumentOut', \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'correctionDetailsIn', \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'correctionReferenceIn', \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestReferenceIn', \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'correctionRequestOut', \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dcoOut', \OpenEuropa\EPoetry\Request\Type\DcoOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticRequestIn', \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyLinguisticRequestIn', \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyRequestReferenceIn', \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyRequestDetailsIn', \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyProductRequestIn', \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'modifyAuxiliaryDocumentsIn', \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'updateCallbackUrlOut', \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dossier', \OpenEuropa\EPoetry\Request\Type\Dossier::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestDetails', \OpenEuropa\EPoetry\Request\Type\RequestDetails::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'originalDocument', \OpenEuropa\EPoetry\Request\Type\OriginalDocument::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticSection', \OpenEuropa\EPoetry\Request\Type\LinguisticSection::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'product', \OpenEuropa\EPoetry\Request\Type\Product::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linquisticRequest', \OpenEuropa\EPoetry\Request\Type\LinquisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestReference', \OpenEuropa\EPoetry\Request\Type\RequestReference::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'contactPerson', \OpenEuropa\EPoetry\Request\Type\ContactPerson::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'DCO', \OpenEuropa\EPoetry\Request\Type\DCO::class),
        );
    }

    public static function enums(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
        );
    }
}
