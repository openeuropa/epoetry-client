<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin;

use Http\Client\Common\PluginClient;
use OpenEuropa\EPoetry\Logger\LoggerPlugin;
use OpenEuropa\EPoetry\Notification\Exception\NotificationValidationException;
use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use VeeWee\Xml\Dom\Traverser\Visitor\RemoveNamespaces;
use function VeeWee\Xml\Dom\Configurator\traverse;
use function VeeWee\Xml\Encoding\xml_decode;

class EuLoginTicketValidation implements TicketValidationInterface
{
    /**
     * Full URL handing incoming ePoetry notifications.
     *
     * @var string
     */
    private string $callbackUrl;

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
     * @param string $callbackUrl
     * @param string $euLoginBasePath
     * @param string $jobAccount
     * @param \Psr\Http\Message\RequestFactoryInterface $requestFactory
     * @param \Psr\Http\Client\ClientInterface $httpClient
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(string $callbackUrl, string $euLoginBasePath, string $jobAccount, RequestFactoryInterface $requestFactory, ClientInterface $httpClient, LoggerInterface $logger)
    {
        $this->callbackUrl = $callbackUrl;
        $this->euLoginBasePath = $euLoginBasePath;
        $this->jobAccount = $jobAccount;
        $this->requestFactory = $requestFactory;
        $this->httpClient = $httpClient;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function validate(RequestInterface $request): bool
    {
        $pluginClient = new PluginClient($this->httpClient, [
            new LoggerPlugin($this->logger)
        ]);

        try {
            $ticket = $this->extractTicket($request);
            $uri = sprintf(
                '%s/cas/strictValidate?service=%s&format=json&ticket=%s',
                $this->euLoginBasePath,
                $this->callbackUrl,
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

    /**
     * Extract ticket from request.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return string
     *
     * @throws \OpenEuropa\EPoetry\Notification\Exception\NotificationValidationException
     */
    private function extractTicket(RequestInterface $request): string
    {
        $body = $request->getBody()->getContents();
        $data = xml_decode($body, traverse(new RemoveNamespaces()));
        if (!isset($data['Envelope']['Header']['ProxyTicket'])) {
            throw new NotificationValidationException('Request body element <ProxyTicket/> not found.');
        }
        $ticket = trim($data['Envelope']['Header']['ProxyTicket']);
        if (empty($ticket)) {
            throw new NotificationValidationException('Request body element <ProxyTicket/> found, but empty.');
        }
        return $ticket;
    }
}
