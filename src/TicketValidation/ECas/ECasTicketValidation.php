<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\TicketValidation\ECas;

use EcPhp\CasLib\Contract\CasInterface;
use EcPhp\CasLib\Contract\Response\Type\ServiceValidate as TypeServiceValidate;
use OpenEuropa\EPoetry\Notification\Exception\NotificationValidationException;
use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Throwable;
use VeeWee\Xml\Dom\Traverser\Visitor\RemoveNamespaces;
use function VeeWee\Xml\Dom\Configurator\traverse;
use function VeeWee\Xml\Encoding\xml_decode;

final class ECasTicketValidation implements TicketValidationInterface
{
    /**
     * @param string $jobAccount
     *    Job account of ePoetry service.
     *    A ticket is considered valid if it is associated with a job account
     *    that matches this one.
     *    Check the following documentation for the actual value:
     *    @link https://citnet.tech.ec.europa.eu/CITnet/confluence/pages/viewpage.action?pageId=973319436
     */
    public function __construct(
        private readonly string $jobAccount,
        private readonly CasInterface $cas
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function validate(RequestInterface $notificationRequest): bool
    {
        try {
            $ticket = $this->extractTicket($notificationRequest);
        } catch (Throwable $exception) {
            throw new NotificationValidationException(
                sprintf(
                    'EU Login ticket validation failed due to the following error: %s',
                    $exception->getMessage()
                ),
                $exception->getCode(),
                $exception
            );
        }

        try {
            /** @var TypeServiceValidate $response */
            $response = $this
                ->cas
                ->requestTicketValidation(
                    $notificationRequest,
                    ['ticket' => $ticket]
                );
        } catch (Throwable $exception) {
            throw new NotificationValidationException(
                sprintf(
                    'EU Login ticket validation failed with the following error: %s %s',
                    $exception->getCode(),
                    $exception->getMessage(),
                ),
                $exception->getCode(),
                $exception
            );
        }

        if ($this->jobAccount !== $user = $response->getCredentials()['user'] ?? '') {
            throw new NotificationValidationException(
                sprintf(
                    'EU Login ticket account mismatched: %s was expected, while %s was returned.',
                    $this->jobAccount,
                    $user
                )
            );
        }

        return true;
    }

    /**
     * Extract ticket from request.
     *
     * @throws NotificationValidationException
     */
    private function extractTicket(ServerRequestInterface $request): string
    {
        $data = xml_decode(
            $request->getBody()->getContents(),
            traverse(new RemoveNamespaces())
        );

        if (!isset($data['Envelope']['Header']['ProxyTicket'])) {
            throw new NotificationValidationException('Request body element <ProxyTicket/> not found.');
        }

        $ticket = trim($data['Envelope']['Header']['ProxyTicket']);

        if ('' === $ticket) {
            throw new NotificationValidationException('Request body element <ProxyTicket/> found, but empty.');
        }

        return $ticket;
    }
}
