<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateLinguisticRequestCommand extends BaseRequestCommand
{
    /**
     * {@inheritdoc}
     */
    protected static $defaultName = 'request:create-linguistic-request';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();
        $this->setDescription('Build and send a CreateRequests to ePoetry.');
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestObjectClass(): string
    {
        return CreateLinguisticRequest::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $factory = $this->getRequestFactory($input);
        $object = $this->getRequestObject($input);
        if ($object === null) {
            return 1;
        }

        $response = $factory->getRequestClient()->createLinguisticRequest($object);
        $this->outputResponse($output, $factory, $response);
        return 0;
    }
}
