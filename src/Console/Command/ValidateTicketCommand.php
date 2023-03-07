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
        $this
            ->addArgument('account', InputArgument::REQUIRED, 'Job account.')
            ->addArgument('ticket', InputArgument::REQUIRED, 'Ticket to be validated.')
            ->setDescription('Validate ticket for given job account.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->validation->validate($input->getArgument('account'), $input->getArgument('ticket')));
        return 0;
    }
}
