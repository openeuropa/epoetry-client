<?php

namespace OpenEuropa\EPoetry\TicketValidation;

use OpenEuropa\EPoetry\TicketValidation\Type;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMapCollection;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMap;

class TicketValidationClassmap
{
    public static function getCollection() : \Soap\ExtSoapEngine\Configuration\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
            new ClassMap('serviceResponse', Type\ServiceResponse::class),
            new ClassMap('authenticationSuccessType', Type\AuthenticationSuccessType::class),
            new ClassMap('registrationLevelVersion', Type\RegistrationLevelVersion::class),
            new ClassMap('extendedAttributes', Type\ExtendedAttributes::class),
            new ClassMap('groups', Type\Groups::class),
            new ClassMap('strengths', Type\Strengths::class),
            new ClassMap('authenticationFactors', Type\AuthenticationFactors::class),
            new ClassMap('proxies', Type\Proxies::class),
            new ClassMap('authenticationFailureType', Type\AuthenticationFailureType::class),
            new ClassMap('proxySuccessType', Type\ProxySuccessType::class),
            new ClassMap('proxyFailureType', Type\ProxyFailureType::class),
            new ClassMap('userConfirmationSignatureRequest', Type\UserConfirmationSignatureRequest::class),
            new ClassMap('signatureRequestFailureType', Type\SignatureRequestFailureType::class),
            new ClassMap('messageAuthenticationSignature', Type\MessageAuthenticationSignature::class),
            new ClassMap('messageAuthenticationFailureType', Type\MessageAuthenticationFailureType::class),
            new ClassMap('userConfirmationSignature', Type\UserConfirmationSignature::class),
            new ClassMap('signatureFailureType', Type\SignatureFailureType::class),
            new ClassMap('loginRequest', Type\LoginRequest::class),
            new ClassMap('loginRequestSuccessType', Type\LoginRequestSuccessType::class),
            new ClassMap('loginRequestFailureType', Type\LoginRequestFailureType::class),
            new ClassMap('attributeType', Type\AttributeType::class),
            new ClassMap('mobileDeviceType', Type\MobileDeviceType::class),
            new ClassMap('webAuthnDeviceType', Type\WebAuthnDeviceType::class),
            new ClassMap('deviceCertificatePath', Type\DeviceCertificatePath::class),
            new ClassMap('serviceRequest', Type\ServiceRequest::class),
            new ClassMap('ticketTypes', Type\TicketTypes::class),
            new ClassMap('acceptStrengths', Type\AcceptStrengths::class),
        );
    }
}

