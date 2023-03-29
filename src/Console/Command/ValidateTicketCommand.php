<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Validate given ticket.
 */
class ValidateTicketCommand extends Command
{
    protected static $defaultName = 'authentication:validate-ticket';

    private LoggerInterface $logger;

    private TicketValidationInterface $validation;

    public function __construct(LoggerInterface $logger, TicketValidationInterface $validation)
    {
        parent::__construct(null);
        $this->logger = $logger;
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
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $success = $this->validation->validate($input->getArgument('ticket'));
        if ($success) {
            $output->writeln('Ticket successfully validated.');
            return 0;
        }
        return 1;
    }
}
