<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Request\Type\ResubmitRequest;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ResubmitRequestCommand extends BaseRequestCommand
{
    /**
     * {@inheritdoc}
     */
    protected static $defaultName = 'resubmit:resubmit-request';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();
        $this->setDescription('Build and send a ResubmitRequests to ePoetry.');
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestObjectClass(): string
    {
        return ResubmitRequest::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $factory = $this->getRequestFactory();
        $object = $this->getRequestObject($input);
        if ($object === null) {
            return 1;
        }

        $response = $factory->getRequestClient()->resubmitRequest($object);
        $this->outputResponse($output, $factory, $response);
        return 0;
    }
}
