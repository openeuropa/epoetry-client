<?php

namespace OpenEuropa\EPoetry\Authentication\ClientCertificate;

use Http\Client\Common\PluginClient;
use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;
use OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\GetServiceTicket;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Logger\LoggerPlugin;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Psr\Log\LoggerInterface;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\Psr18Transport\Psr18Transport;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\Psr18Client;

/**
 * Client certificate authentication plugin.
 */
class ClientCertificateAuthentication implements AuthenticationInterface
{
    /**
     * Service URL for which to ask an authentication ticket.
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

    /**
     * Logger service.
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Constructor.
     *
     * @param string $serviceUrl
     * @param string $certFilepath
     * @param string $certPassword
     */
    public function __construct(string $serviceUrl, string $certFilepath, string $certPassword, string $euLoginBasePath, LoggerInterface $logger)
    {
        $this->serviceUrl = $serviceUrl;
        $this->certFilepath = $certFilepath;
        $this->certPassword = $certPassword;
        $this->euLoginBasePath = $euLoginBasePath;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function getTicket(): string
    {
        $httpClient = new CurlHttpClient([
            'local_cert' => $this->certFilepath,
            'passphrase' => $this->certPassword,
            'extra' => [
                'curl' => [
                    \CURLOPT_SSLCERTTYPE => 'P12',
                ],
            ],
        ]);

        // Add HTTP logging middleware.
        $plugins[] = new LoggerPlugin($this->logger);

        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('CertLoginSoap11Port', "{$this->euLoginBasePath}/cas/ws/CertLoginService/soap/1.1")
            ->withPortLocation('CertLoginSoap12Port', "{$this->euLoginBasePath}/cas/ws/CertLoginService/soap/1.2")
            ->withPortLocation('CertLoginHttpGetPort', "{$this->euLoginBasePath}/cas/ws/CertLoginService/http")
            ->withPortLocation('CertLoginHttpPostPort', "{$this->euLoginBasePath}/cas/ws/CertLoginService/http");
        $pluginClient = new PluginClient(new Psr18Client($httpClient), $plugins);
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../../../resources/authentication.wsdl', [])
                ->withClassMap(ClientCertificateClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            Psr18Transport::createForClient($pluginClient)
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);
        $client = new ClientCertificateClient($caller);

        $ticket = '';
        try {
            $ticket = $client
                ->getServiceTicket(new GetServiceTicket($this->serviceUrl))
                ->getServiceTicket();
        } catch (\Exception $e) {
            $this->logger->error('Could not get EU Login service ticket due to the following error: {error}', [
                'error' => $e->getMessage(),
            ]);
        }
        return $ticket;
    }
}
