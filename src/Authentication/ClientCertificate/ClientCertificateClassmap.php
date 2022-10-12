<?php

namespace OpenEuropa\EPoetry\Authentication\ClientCertificate;

use OpenEuropa\EPoetry\Authentication\ClientCertificate\Type;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMapCollection;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMap;

class ClientCertificateClassmap
{
    public static function getCollection() : \Soap\ExtSoapEngine\Configuration\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
            new ClassMap('getServiceTicket', Type\GetServiceTicket::class),
            new ClassMap('getServiceTicketResponse', Type\GetServiceTicketResponse::class),
        );
    }
}
