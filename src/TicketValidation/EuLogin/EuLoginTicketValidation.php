<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin;

use Http\Client\Common\PluginClient;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Logger\LoggerPlugin;
use OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\ServiceRequest;
use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;
use Psr\Log\LoggerInterface;
use Soap\Psr18Transport\Psr18Transport;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\Psr18Client;

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
     * Acceptance: https://ecasa.cc.cec.eu.int:7003
     * Production: https://ecas.cc.cec.eu.int:7003
     *
     * @var string
     */
    private string $euLoginBasePath;

    /**
     * Logger service.
     *
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * Constructor.
     *
     * @param string $serviceUrl
     * @param string $euLoginBasePath
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(string $serviceUrl, string $euLoginBasePath, LoggerInterface $logger)
    {
        $this->serviceUrl = $serviceUrl;
        $this->euLoginBasePath = $euLoginBasePath;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function validate(string $account, string $ticket): bool
    {
        // Add HTTP logging middleware.
        $plugins[] = new LoggerPlugin($this->logger);

        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('TicketValidationServiceSoap11Port', "{$this->euLoginBasePath}/cas/ws/TicketValidationService/soap/1.1")
            ->withPortLocation('TicketValidationServiceSoap12Port', "{$this->euLoginBasePath}/cas/ws/TicketValidationService/soap/1.2")
            ->withPortLocation('TicketValidationServiceHttpPostPort', "{$this->euLoginBasePath}/cas/ws/TicketValidationService/http")
            ->withPortLocation('TicketValidationService2WaySSLSoap11Port', "{$this->euLoginBasePath}/cas/ws/TicketValidationService/soap/1.1")
            ->withPortLocation('TicketValidationService2WaySSLSoap12Port', "{$this->euLoginBasePath}/cas/ws/TicketValidationService/soap/1.2")
            ->withPortLocation('TicketValidationService2WaySSLHttpPostPort', "{$this->euLoginBasePath}/cas/ws/TicketValidationService/http");

        $httpClient = new CurlHttpClient();
        $pluginClient = new PluginClient(new Psr18Client($httpClient), $plugins);

        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../../../resources/ticket-validation.wsdl', [])
                ->withClassMap(EuLoginTicketValidationClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            Psr18Transport::createForClient($pluginClient)
        );
        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        $client = new EuLoginTicketValidationClient($caller);
        try {
            $request = (new ServiceRequest())
                ->withTicket($ticket)
                ->withService($this->serviceUrl)
                ->withUserDetails(true)
            ;
            $response = $client->validate($request);
            if ($response->getAuthenticationFailure() !== null) {
                $this->logger->error('EULogin ticket validation failed with the following error code: ' . $response->getAuthenticationFailure()->getCode());
                return false;
            }
            $uid = $response->getAuthenticationSuccess()->getUid();
            if ($account !== $uid) {
                $this->logger->error("EULogin ticket user ID is '{$uid}', while '{$account}' was expected.");
                return false;
            }
            return true;
        } catch (\Exception $e) {
            $this->logger->error('EULogin ticket validation failed due to the following error: ' . $e->getMessage());
            return false;
        }
    }
}
