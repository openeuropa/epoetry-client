<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin;

use Http\Client\Common\PluginClient;
use OpenEuropa\EPoetry\Logger\LoggerPlugin;
use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;
use Psr\Log\LoggerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class EuLoginTicketValidation implements TicketValidationInterface
{
    /**
     * Service URL to validate a ticket for.
     *
     * For example: https://webgate.acceptance.ec.europa.eu/epoetrytst/epoetry/webservices/dgtService
     *
     * @var string
     */
    private string $serviceUrl;

    /**
     * Path to client certificate in PK12 format.
     *
     * @var string
     */
    private string $certFilepath;

    /**
     * Local certificate password.
     *
     * @var string
     */
    private string $certPassword;

    /**
     * Endpoint of EU Login service.
     *
     * Acceptance: https://ecasa.cc.cec.eu.int:7003
     * Production: https://ecas.cc.cec.eu.int:7003
     *
     * @var string
     */
    private string $euLoginBasePath;

    private RequestFactoryInterface $requestFactory;

    private ClientInterface $httpClient;

    protected LoggerInterface $logger;

    /**
     * Constructor.
     *
     * @param string $serviceUrl
     * @param string $euLoginBasePath
     * @param \Psr\Http\Message\RequestFactoryInterface $requestFactory
     * @param \Psr\Http\Client\ClientInterface $httpClient
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(string $serviceUrl, string $euLoginBasePath, RequestFactoryInterface $requestFactory, ClientInterface $httpClient, LoggerInterface $logger)
    {
        $this->serviceUrl = $serviceUrl;
        $this->euLoginBasePath = $euLoginBasePath;
        $this->requestFactory = $requestFactory;
        $this->httpClient = $httpClient;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function validate(string $account, string $ticket): bool
    {
        $pluginClient = new PluginClient($this->httpClient, [
            new LoggerPlugin($this->logger)
        ]);

        try {
            $uri = sprintf(
                '%s/cas/strictValidate?service=%s&format=json&ticket=%s',
                $this->euLoginBasePath,
                $this->serviceUrl,
                $ticket
            );
            $request = $this->requestFactory->createRequest('GET', $uri);
            $response = $pluginClient->sendRequest($request);

            // Log service level error, and fail validation.
            if ($response->getStatusCode() !== 200) {
                $this->logger->error('EU Login ticket validation request failed with HTTP status {code}: ', [
                    'code' => $response->getStatusCode(),
                ]);
                return false;
            }

            // Log authentication error, and fail validation.
            $serviceResponse = json_decode($response->getBody()->getContents(), true);
            if (isset($serviceResponse['serviceResponse']['authenticationFailure'])) {
                $this->logger->error('EU Login ticket validation failed with the following error: {code} {description} ', [
                    'code' => $serviceResponse['serviceResponse']['authenticationFailure']['code'],
                    'description' => $serviceResponse['serviceResponse']['authenticationFailure']['description'],
                ]);
                return false;
            }

            // If ticket returns a different user than the one expected,
            // log error and fail validation.
            $user = $serviceResponse['serviceResponse']['authenticationSuccess']['user'];
            if ($account !== $user) {
                $this->logger->error('EU Login ticket account mismatched: {account} was expected, while {user} was returned.', [
                    'account' => $account,
                    'user' => $user,
                ]);
                return false;
            }

            // Else, validation is successful.
            return true;
        } catch (\Exception $exception) {
            $this->logger->error('EU Login ticket validation failed due to the following error: {message}', [
                'exception' => $exception,
                'message' => $exception->getMessage(),
            ]);
            return false;
        }
    }
}
