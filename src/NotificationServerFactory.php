<?php

namespace OpenEuropa\EPoetry;

use GuzzleHttp\Psr7\Response;
use Http\Message\Formatter\FullHttpMessageFormatter;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\NotificationHandler;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Soap\ExtSoapEngine\Configuration\TypeConverter\TypeConverterCollection;
use Soap\ExtSoapEngine\ExtSoapOptionsResolverFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Soap\ExtSoapEngine\Configuration\TypeConverter;

class NotificationServerFactory
{

    /**
     * Callback URL, where notifications are supposed to be sent by ePoetry.
     *
     * @var string
     */
    protected string $callback;

    /**
     * Event dispatcher service.
     *
     * @var EventDispatcherInterface
     */
    protected EventDispatcherInterface $eventDispatcher;

    /**
     * Logger service.
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Serializer service.
     *
     * @var \Symfony\Component\Serializer\SerializerInterface
     */
    protected SerializerInterface $serializer;

    /**
     * Constructs NotificationServerFactory object.
     *
     * @param string $callback
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     */
    public function __construct(string $callback, EventDispatcherInterface $eventDispatcher, LoggerInterface $logger, SerializerInterface $serializer)
    {
        $this->callback = $callback;
        $this->eventDispatcher = $eventDispatcher;
        $this->logger = $logger;
        $this->serializer = $serializer;
    }

    /**
     * Handle request.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(RequestInterface $request): ResponseInterface
    {
        $formatter = new FullHttpMessageFormatter(null);
        $handler = new NotificationHandler($this->eventDispatcher, $this->logger, $this->serializer);
        $server = new \SoapServer($this->getEncodedWsdl(), ExtSoapOptionsResolverFactory::create()->resolve([
            'classmap' => NotificationClassmap::getCollection(),
            'typemap' => new TypeConverterCollection([
                new TypeConverter\DateTimeTypeConverter(),
                new TypeConverter\DateTypeConverter(),
            ]),

        ]));
        $server->setObject($handler);

        ob_start();
        try {
            $this->logger->info("Received notification:\n{request}", [
                'request' => $formatter->formatRequest($request),
            ]);
            $server->handle($request->getBody()->getContents());
            $xml = ob_get_contents();
            ob_end_clean();
        } catch (\Exception $e) {
            // Make sure we clean the opened buffer, if an exception occurred,
            // then throw the caught exception.
            ob_end_clean();
            throw $e;
        }

        $response = new Response(200, ['content-type' => 'text/xml'], $xml);
        $this->logger->info("Returned response:\n{response}", [
            'response' => $formatter->formatResponseForRequest($response, $request),
        ]);
        return $response;
    }

    /**
     * Get WSDL as a plain XML string.
     *
     * @return string
     */
    public function getWsdl(): string
    {
        return file_get_contents($this->getEncodedWsdl());
    }

    /**
     * Get WSDL as a base64 encoded file URI.
     *
     * @return string
     */
    private function getEncodedWsdl(): string
    {
        $provider = new LocalWsdlProvider();
        $provider->withPortLocation('DgtClientNotificationReceiverWSPort', $this->callback);
        return $provider(__DIR__. '/../resources/notification.wsdl');
    }
}
