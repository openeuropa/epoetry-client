<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Validate given ticket.
 */
#[AsCommand(name: 'authentication:validate-ticket')]
class ValidateTicketCommand extends Command
{
    private TicketValidationInterface $validation;

    public function __construct(TicketValidationInterface $validation)
    {
        parent::__construct(null);
        $this->validation = $validation;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->addArgument('ticket', InputArgument::REQUIRED, 'Ticket to be validated.')
            ->setDescription('Validate given ticket.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $success = $this->validation->validate($input->getArgument('ticket'));
        if ($success) {
            $output->writeln('Ticket successfully validated.');
            return 0;
        }
        return 1;
    }
}
