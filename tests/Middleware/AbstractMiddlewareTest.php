<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use OpenEuropa\EPoetry\Tests\AbstractTest;

/**
 * Class AbstractMiddlewareTest.
 */
abstract class AbstractMiddlewareTest extends AbstractTest
{
    /**
     * {@inheritdoc}
     */
    public function getFixtureContent(string $filename): string
    {
        return parent::getFixtureContent(__DIR__ . '/../fixtures/Middleware/' . $filename);
    }

    /**
     * @return string
     */
    public function getXml(): string
    {
        return <<< 'EOF'
<?xml version='1.0' encoding='UTF-8'?>
<S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
    <S:Body>
        <ns0:createRequestsResponse xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
        </ns0:createRequestsResponse>
    </S:Body>
</S:Envelope>
EOF;
    }
}
