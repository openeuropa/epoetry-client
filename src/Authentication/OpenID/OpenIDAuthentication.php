<?php

namespace OpenEuropa\EPoetry\Authentication\OpenID;

use Facile\OpenIDClient\Client\ClientBuilder;
use Facile\OpenIDClient\Client\Metadata\ClientMetadata;
use Facile\OpenIDClient\Issuer\IssuerBuilder;
use Facile\OpenIDClient\Service\Builder\AuthorizationServiceBuilder;
use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;
use OpenEuropa\EPoetry\Exception\ClientException;

/**
 * OpenID Connect authentication plugin.
 */
class OpenIDAuthentication implements AuthenticationInterface
{

    /**
     * OpenID Connect ".well-known" endpoint URL.
     *
     * For example: https://ecas.acceptance.ec.europa.eu/cas/oauth2/.well-known/openid-configuration
     *
     * @var string
     */
    private string $wellKnownUrl;

    /**
     * Local path to client metadata JSON file.
     *
     * @var string
     */
    private string $clientMetadataFilepath;

    /**
     * Service URL for which to ask an authentication ticket.
     *
     * For example: https://webgate.acceptance.ec.europa.eu/epoetrytst/epoetry/webservices/dgtService
     *
     * @var string
     */
    private string $serviceUrl;

    /**
     * EU Login service token endpoint.
     *
     * For example: https://ecas.acceptance.ec.europa.eu/cas/oauth2/token
     *
     * @var string
     */
    private string $tokenEndpoint;

    /**
     * Constructor.
     *
     * @param string $wellKnownUrl
     * @param string $clientMetadataFilepath
     * @param string $serviceUrl
     * @param string $tokenEndpoint
     */
    public function __construct(string $wellKnownUrl, string $clientMetadataFilepath, string $serviceUrl, string $tokenEndpoint)
    {
        $this->wellKnownUrl = $wellKnownUrl;
        $this->clientMetadataFilepath = $clientMetadataFilepath;
        $this->serviceUrl = $serviceUrl;
        $this->tokenEndpoint = $tokenEndpoint;
    }

    /**
     * @inheritDoc
     */
    public function getTicket(): string
    {
        $issuer = (new IssuerBuilder())->build($this->wellKnownUrl);
        if (!file_exists($this->clientMetadataFilepath)) {
            throw new ClientException("Client metadata file '{$this->clientMetadataFilepath}' not found.");
        }

        $metadata = json_decode(file_get_contents($this->clientMetadataFilepath), true);
        if ($metadata === null) {
            throw new ClientException("Client metadata file '{$this->clientMetadataFilepath}' cannot be decoded.");
        }
        $clientMetadata = ClientMetadata::fromArray($metadata);
        $client = (new ClientBuilder())
            ->setIssuer($issuer)
            ->setClientMetadata($clientMetadata)
            ->build();

        $authorizationService = (new AuthorizationServiceBuilder())->build();
        $tokenSet = $authorizationService->grant($client, [
            "grant_type" => "client_credentials",
            "resource" => $this->serviceUrl,
            "aud" => $this->tokenEndpoint,
            "requested_token_type" => "urn:ietf:params:oauth:token-type:cas_ticket",
        ]);

        return $tokenSet->getAccessToken();
    }
}
