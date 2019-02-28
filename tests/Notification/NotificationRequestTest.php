<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\Serializer\RequestsSerializer;
use OpenEuropa\EPoetry\Type\CreateRequests;

/**
 * @internal
 * @coversNothing
 */
final class NotificationRequestTest extends AbstractNotificationRequestTest
{
    /**
     * Data provider.
     *
     * @return array
     */
    public function responseParsingCases(): array
    {
        return $this->getFixture('notification-parse-test.yml');
    }

    /**
     * Test parsing a SOAP response.
     *
     * @param string $response
     * @param array $request
     * @param mixed $expectations
     *
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     *
     * @dataProvider responseParsingCases
     */
    public function testResponseParsing(string $response, array $request, $expectations): void
    {
        $response = new Response(200, [], $this->getFixtureContent($response));
        $this->httpClient->addResponse($response);

        $client = $this->createNotificationClientFactory()->getClient();

        $values = [
            'response' => $client->receiveNotification(),
        ];

        $this->assertExpressionLanguageExpressions(
            $expectations['assertions'],
            $values
        );
    }
}
