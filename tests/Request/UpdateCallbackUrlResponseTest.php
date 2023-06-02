<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Http\Mock\Client as MockClient;
use Nyholm\Psr7\Response;
use OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrl;
use OpenEuropa\EPoetry\RequestClientFactory;
use OpenEuropa\EPoetry\Tests\Authentication\MockAuthentication;
use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test UpdateCallbackUrlResponse class.
 */
final class UpdateCallbackUrlResponseTest extends BaseRequestTest
{
    /**
     * Tests updateCallbackUrlResponse xml into object conversion.
     *
     * @dataProvider dataProviderUpdateCallbackUrlResponse
     */
    public function testUpdateCallbackUrlResponse($response, $expectations): void
    {
        $object = $this->serializer->deserialize($response, 'OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlResponse', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $object]);
    }

    /**
     * Tests raw response processing.
     */
    public function testUpdateCallbackUrlRawResponse(): void
    {
        $mockClient = new MockClient();
        $authentication = new MockAuthentication('[proxy ticket]');

        $response = <<<RESPONSE
<?xml version='1.0' encoding='UTF-8'?>
<S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
  <env:Header/>
  <S:Body>
    <ns0:updateCallbackUrlResponse xmlns:ns0="http://eu.europa.ec.dgt.epoetry">
      <return>
        <success>true</success>
        <oldCallbackUrl>https://old.url</oldCallbackUrl>
        <newCallbackUrl>https://new.url</newCallbackUrl>
        <application>app</application>
        <message>Callback successfully updated</message>
      </return>
    </ns0:updateCallbackUrlResponse>
  </S:Body>
</S:Envelope>
RESPONSE;


        // Assert proxy token exists in the header.
        $mockClient->addResponse(new Response(200, [], $response));
        $clientFactory = new RequestClientFactory('http://foo.bar', $authentication, null, null, $mockClient);
        $requestClient = $clientFactory->getRequestClient();

        $request = (new UpdateCallbackUrl())
            ->setCallbackUrl('https://webgate.ec.europa.eu/poetryresponse/epoetry-test.fpfis.eu/')
            ->setApplicationName('DRUPAL-TEST');

        $response = $requestClient->updateCallbackUrl($request);
        $this->assertEquals('https://old.url', $response->getReturn()->getOldCallbackUrl());
        $this->assertEquals('https://new.url', $response->getReturn()->getNewCallbackUrl());
        $this->assertEquals('app', $response->getReturn()->getApplication());
        $this->assertEquals('Callback successfully updated', $response->getReturn()->getMessage());
        $this->assertEquals(true, $response->getReturn()->isSuccess());
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderUpdateCallbackUrlResponse(): array
    {
        return $this->getFixture('updateCallbackUrlResponse.yaml', '/Request');
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        // We don't have real example. Use what we have.
        $xml = file_get_contents(__DIR__ . '/fixtures/createLinguisticRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('updateCallbackUrl', new SoapResponse($xml));
    }
}
