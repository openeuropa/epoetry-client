<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\TaskRunner\Commands;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use OpenEuropa\EPoetry\EPoetryClientFactory;
use OpenEuropa\EPoetry\Serializer\RequestsSerializer;
use OpenEuropa\EPoetry\Type\CreateRequests;
use OpenEuropa\TaskRunner\Commands\AbstractCommands;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class EPoetryCommands.
 */
class EPoetryCommands extends AbstractCommands
{
    /**
     * Send a CreateRequests to ePoetry.
     *
     * > epoetry:
     * >   wsdl_endpoint: 'https://epoetry.endpoint.wsdl'
     *
     * @command epoetry:create-requests
     *
     * @option wsdl-endpoint    A URL of the WSDL endpoint.
     * @option request-yml      A path to an YML file containing the body of the request.
     *
     * @param array $options
     *
     * @return string
     */
    public function createRequests(array $options = [
        'wsdl-endpoint' => InputOption::VALUE_REQUIRED,
        'request-yml' => InputOption::VALUE_REQUIRED,
    ])
    {
        $guzzle = new GuzzleClient();
        $adapter = new GuzzleAdapter($guzzle);

        /** @var OpenEuropa\EPoetry\EPoetryClientFactory $factory */
        $factory = new EPoetryClientFactory($options['wsdl-endpoint'], $adapter);

        $createRequests = RequestsSerializer::fromFile(
            $options['request-yml'],
            CreateRequests::class,
            'yml'
        );

        return $factory->getClient()->createRequests($createRequests);
    }
}
