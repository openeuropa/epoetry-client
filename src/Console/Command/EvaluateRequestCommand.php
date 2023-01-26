<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Encoder\JsonEncode;

class EvaluateRequestCommand extends BaseRequestCommand
{
    /**
     * {@inheritdoc}
     */
    protected static $defaultName = 'request:evaluate';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();
        $this
            ->addArgument('file', InputArgument::REQUIRED, 'Path to a file containing the code to be evaluated. Check command help for more information.')
            ->setDescription('Evaluate PHP code performing an actual request.')
            ->setHelp(<<<'EOF'
The file should return a function with the following signature:

<?php

use OpenEuropa\EPoetry\RequestClientFactory;
use OpenEuropa\EPoetry\Console\Command\EvaluateRequestReturn;

return function (RequestClientFactory $factory): EvaluateRequestReturn {
    // Build $object here...
    return $factory->getRequestClient()->createLinguisticRequest($object);
};
EOF);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $factory = $this->getRequestFactory();
        $file = $input->getArgument('file');
        if (!file_exists($file)) {
            $this->logger->error("File '{$file}' not found.");
            return 1;
        }
        $function = require $input->getArgument('file');
        /** @var EvaluateRequestReturn $result */
        $result = $function($factory);
        $output->writeln($this->serializer->serialize($result->getRequest(), 'xml'));
        $this->outputResponse($output, $factory, $result->getResponse());
        return 0;
    }
}
