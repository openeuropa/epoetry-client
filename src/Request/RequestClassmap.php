<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request;

use Phpro\SoapClient\Soap\ClassMap\ClassMapCollection;
use Phpro\SoapClient\Soap\ClassMap\ClassMap;

class RequestClassmap
{
    public static function getCollection(): ClassMapCollection
    {
        return new ClassMapCollection([
            new ClassMap('receiveNotificationsResponse', Type\ReceiveNotificationsResponse::class),
            new ClassMap('originalDocumentIn', Type\OriginalDocumentIn::class),
            new ClassMap('linguisticSections', Type\LinguisticSections::class),
            new ClassMap('requestReference', Type\RequestReference::class),
            new ClassMap('ContactNotFoundException', Type\ContactNotFoundException::class),
            new ClassMap('productReference', Type\ProductReference::class),
            new ClassMap('contactPerson', Type\ContactPerson::class),
            new ClassMap('modifyRequest', Type\ModifyRequest::class),
            new ClassMap('language', Type\Language::class),
            new ClassMap('dgtNotification', Type\DgtNotification::class),
            new ClassMap('InternalTechnicalErrorException', Type\InternalTechnicalErrorException::class),
            new ClassMap('linguisticRequestIn', Type\LinguisticRequestIn::class),
            new ClassMap('contacts', Type\Contacts::class),
            new ClassMap('productRequests', Type\ProductRequests::class),
            new ClassMap('auxiliaryDocuments', Type\AuxiliaryDocuments::class),
            new ClassMap('MissingOrInvalidParameterException', Type\MissingOrInvalidParameterException::class),
            new ClassMap('linguisticSectionIn', Type\LinguisticSectionIn::class),
            new ClassMap('createRequestsResponse', Type\CreateRequestsResponse::class),
            new ClassMap('dgtDocumentIn', Type\DgtDocumentIn::class),
            new ClassMap('auxiliaryDocumentIn', Type\AuxiliaryDocumentIn::class),
            new ClassMap('dgtDocument', Type\DgtDocument::class),
            new ClassMap('correctTranslationResponse', Type\CorrectTranslationResponse::class),
            new ClassMap('TemplateNotFoundException', Type\TemplateNotFoundException::class),
            new ClassMap('ProductNotFoundException', Type\ProductNotFoundException::class),
            new ClassMap('receiveNotifications', Type\ReceiveNotifications::class),
            new ClassMap('originalDocument', Type\OriginalDocument::class),
            new ClassMap('languageIn', Type\LanguageIn::class),
            new ClassMap('auxiliaryDocument', Type\AuxiliaryDocument::class),
            new ClassMap('findLinguisticRequest', Type\FindLinguisticRequest::class),
            new ClassMap('createRequests', Type\CreateRequests::class),
            new ClassMap('requestGeneralInfo', Type\RequestGeneralInfo::class),
            new ClassMap('getLinguisticRequestResponse', Type\GetLinguisticRequestResponse::class),
            new ClassMap('getLinguisticRequest', Type\GetLinguisticRequest::class),
            new ClassMap('linguisticSection', Type\LinguisticSection::class),
            new ClassMap('findLinguisticRequestResponse', Type\FindLinguisticRequestResponse::class),
            new ClassMap('correctionDocument', Type\CorrectionDocument::class),
            new ClassMap('productRequestIn', Type\ProductRequestIn::class),
            new ClassMap('requestReferenceIn', Type\RequestReferenceIn::class),
            new ClassMap('productRequest', Type\ProductRequest::class),
            new ClassMap('RequestNotFoundException', Type\RequestNotFoundException::class),
            new ClassMap('requestGeneralInfoIn', Type\RequestGeneralInfoIn::class),
            new ClassMap('PermissionDeniedException', Type\PermissionDeniedException::class),
            new ClassMap('linguisticRequest', Type\LinguisticRequest::class),
            new ClassMap('correctTranslation', Type\CorrectTranslation::class),
            new ClassMap('modifyRequestResponse', Type\ModifyRequestResponse::class),
            new ClassMap('contactPersonIn', Type\ContactPersonIn::class),
        ]);
    }
}
