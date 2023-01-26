<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use Phpro\SoapClient\Type\RequestInterface;
use Symfony\Component\Console\Input\InputArgument;
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
        $this->addArgument('payload', InputArgument::REQUIRED, 'Path to a file containing the ePoetry request payload, in YAML format. Check README.md for an example.')
            ->setDescription('Build and send a CreateRequests to ePoetry.');
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

        $response = $factory->getRequestClient()->createLinguisticRequest($object);
        $this->outputResponse($output, $factory, $response);
        return 0;
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     *
     * @return \Phpro\SoapClient\Type\RequestInterface|null
     */
    protected function getRequestObject(InputInterface $input): ?RequestInterface
    {
        $payloadPath = $input->getArgument('payload');
        if (!file_exists($payloadPath)) {
            $this->logger->error("File '{$payloadPath}' not found.");
            return null;
        }

        $content = file_get_contents($payloadPath);
        return $this->serializer->deserialize($content, CreateLinguisticRequest::class, 'yaml');
    }
}
