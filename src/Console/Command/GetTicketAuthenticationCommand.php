<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Get authentication ticket.
 */
class GetTicketAuthenticationCommand extends Command
{
    protected static $defaultName = 'authentication:get-ticket';

    private LoggerInterface $logger;

    private AuthenticationInterface $authentication;

    public function __construct(LoggerInterface $logger, AuthenticationInterface $authentication)
    {
        parent::__construct(null);
        $this->logger = $logger;
        $this->authentication = $authentication;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setDescription('Get authentication ticket from the active authentication system.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->authentication->getTicket());
        return 0;
    }
}
