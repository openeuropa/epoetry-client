<?php

namespace OpenEuropa\EPoetry\Authentication\ClientCertificate;

use OpenEuropa\EPoetry\Authentication\ClientCertificate\Type;
use Soap\Encoding\ClassMap\ClassMapCollection;
use Soap\Encoding\ClassMap\ClassMap;

class ClientCertificateClassmap
{
    public static function types(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
            new ClassMap('https://ecas.ec.europa.eu/cas/schemas/ws/CertLogin', 'getServiceTicket', Type\GetServiceTicket::class),
            new ClassMap('https://ecas.ec.europa.eu/cas/schemas/ws/CertLogin', 'getServiceTicketResponse', Type\GetServiceTicketResponse::class),
        );
    }

    public static function enums(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(

        );
    }
}

