<?php

namespace OpenEuropa\EPoetry;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\NotificationHandler;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Soap\ExtSoapEngine\ExtSoapOptionsResolverFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\SerializerInterface;

class NotificationServerFactory {

    /**
     * Event dispatcher service.
     *
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

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
     * Constructs NotificationHandler object.
     *
     * @param EventDispatcherInterface|null $eventDispatcher
     *   Event dispatcher service.
     * @param LoggerInterface|null $logger
     *   Logger service.
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, LoggerInterface $logger, SerializerInterface $serializer) {
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
    public function handle(RequestInterface $request): ResponseInterface {
        $handler = new NotificationHandler($this->eventDispatcher, $this->logger, $this->serializer);
        $wsdl = (new LocalWsdlProvider())(__DIR__. '/../resources/notification.wsdl');
        $server = new \SoapServer($wsdl, ExtSoapOptionsResolverFactory::create()->resolve([
            'classmap' => NotificationClassmap::getCollection(),
        ]));
        $server->setObject($handler);

        ob_start();
        $server->handle($request->getBody()->getContents());
        $xml = ob_get_contents();
        ob_end_clean();

        return new Response(200, [
            'content-type' => 'application/xml',
        ], $xml);
    }

}
