<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Server\Server;

class NotificationServer
{
    /**
     * Handler to use.
     *
     * @var NotificationHandler
     */
    protected $handler;

    /**
     * Options for SoapClient.
     *
     * @var array
     */
    protected $options;
    /**
     * WSDL to use.
     *
     * @var string
     */
    protected $wsdl;

    /**
     * Server constructor.
     *
     * @param string $wsdl
     * @param array $options
     */
    public function __construct(string $wsdl, array $options)
    {
        $this->wsdl = $wsdl;
        $this->options = $options;
    }

    /**
     * @return NotificationHandler
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Handle the SOAP request.
     *
     * @param string $request
     *    The XML of SOAP request.
     *
     * @return string
     *    The XML of SOAP response.
     */
    public function handle($request): string
    {
        $soapServer = new \SoapServer($this->wsdl, $this->options);

        $this->handler = new NotificationHandler();
        $soapServer->setObject($this->handler);

        ob_start();
        $soapServer->handle($request);
        $response = ob_get_contents();
        ob_end_clean();

        return $response;
    }
}
