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
     * Endpoint of EU Login service.
     *
     * Acceptance: https://ecas.acceptance.ec.europa.eu
     * Production: https://ecas.ec.europa.eu
     *
     * @var string
     */
    private string $euLoginBasePath;

    /**
     * Job account of ePoetry service.
     *
     * A ticket is considered valid if it is associated with a job account
     * that matches this one.
     *
     * Check the following documentation for the actual value:
     * @link https://citnet.tech.ec.europa.eu/CITnet/confluence/pages/viewpage.action?pageId=973319436
     *
     * @var string
     */
    private string $jobAccount;

    private RequestFactoryInterface $requestFactory;

    private ClientInterface $httpClient;

    protected LoggerInterface $logger;

    /**
     * Constructor.
     *
     * @param string $serviceUrl
     * @param string $euLoginBasePath
     * @param string $jobAccount
     * @param \Psr\Http\Message\RequestFactoryInterface $requestFactory
     * @param \Psr\Http\Client\ClientInterface $httpClient
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(string $serviceUrl, string $euLoginBasePath, string $jobAccount, RequestFactoryInterface $requestFactory, ClientInterface $httpClient, LoggerInterface $logger)
    {
        $this->serviceUrl = $serviceUrl;
        $this->euLoginBasePath = $euLoginBasePath;
        $this->jobAccount = $jobAccount;
        $this->requestFactory = $requestFactory;
        $this->httpClient = $httpClient;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function validate(string $ticket): bool
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
            if ($this->jobAccount !== $user) {
                $this->logger->error('EU Login ticket account mismatched: {expected} was expected, while {actual} was returned.', [
                    'expected' => $this->jobAccount,
                    'actual' => $user,
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
