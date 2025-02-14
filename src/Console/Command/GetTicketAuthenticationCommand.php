<?php

declare(strict_types=1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Get authentication ticket.
 */
#[AsCommand(name: 'authentication:get-ticket')]
class GetTicketAuthenticationCommand extends Command
{
    private AuthenticationInterface $authentication;

    public function __construct(AuthenticationInterface $validation)
    {
        parent::__construct(null);
        $this->authentication = $validation;
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
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln($this->authentication->getTicket());
        return 0;
    }
}
