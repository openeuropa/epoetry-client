<?php

namespace OpenEuropa\EPoetry\Authentication\ClientCertificate;

use Http\Client\Common\PluginClient;
use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;
use OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\GetServiceTicket;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
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
     * Constructor.
     *
     * @param string $serviceUrl
     * @param string $certFilepath
     * @param string $certPassword
     */
    public function __construct(string $serviceUrl, string $certFilepath, string $certPassword, string $euLoginBasePath)
    {
        $this->serviceUrl = $serviceUrl;
        $this->certFilepath = $certFilepath;
        $this->certPassword = $certPassword;
        $this->euLoginBasePath = $euLoginBasePath;
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

        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('CertLoginSoap11Port', "{$this->euLoginBasePath}/cas/ws/CertLoginService/soap/1.1")
            ->withPortLocation('CertLoginSoap12Port', "{$this->euLoginBasePath}/cas/ws/CertLoginService/soap/1.2")
            ->withPortLocation('CertLoginHttpGetPort', "{$this->euLoginBasePath}/cas/ws/CertLoginService/http")
            ->withPortLocation('CertLoginHttpPostPort', "{$this->euLoginBasePath}/cas/ws/CertLoginService/http");
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../../../resources/authentication.wsdl', [])
                ->withClassMap(ClientCertificateClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            Psr18Transport::createForClient(new PluginClient(new Psr18Client($httpClient)))
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);
        $client = new ClientCertificateClient($caller);

        return $client->getServiceTicket(new GetServiceTicket($this->serviceUrl))
            ->getServiceTicket();
    }
}
