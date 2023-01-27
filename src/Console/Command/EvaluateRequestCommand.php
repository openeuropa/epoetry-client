<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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

return function(): EvaluateRequestReturn {
    // Build $object here...
    $request = (new CreateLinguisticRequest())
        ->setRequestDetails($requestDetails)
        ->setApplicationName('FOO')
        ->setTemplateName('WEBTRA');
    return new EvaluateRequestReturn($request, 'createLinguisticRequest');
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
        /** @var EvaluateRequestReturn $return */
        $return = $function();
        $method = $return->getMethod();
        $request = $return->getRequest();
        $this->logger->info('Sending request...');
        $this->logger->info($this->serializer->serialize($return->getRequest(), 'xml', [
            'xml_format_output' => true,
        ]));
        $response = $factory->getRequestClient()->{$method}($request);
        $this->outputResponse($output, $factory, $response);
        return 0;
    }
}
