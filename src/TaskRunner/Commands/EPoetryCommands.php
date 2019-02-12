<?php

namespace OpenEuropa\EPoetry\TaskRunner\Commands;

use Http\Mock\Client;
use OpenEuropa\EPoetry\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Type\Contacts;
use OpenEuropa\EPoetry\Type\CreateRequests;
use OpenEuropa\EPoetry\Type\LinguisticRequestIn;
use OpenEuropa\EPoetry\Type\RequestGeneralInfoIn;
use OpenEuropa\TaskRunner\Commands\AbstractCommands;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Yaml\Yaml;
use OpenEuropa\EPoetry\EPoetryClientFactory;
use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

/**
 * Class EPoetryCommands
 *
 * @package My\Project\TaskRunner\Commands
 */
class EPoetryCommands extends AbstractCommands
{

    /**
     * Send a request to ePoetry.
     *
     * > epoetry:
     * >   wsdl_endpoint: 'https://epoetry.endpoint.wsdl'
     *
     * @command epoetry:send-request
     *
     * @option xml-path     A path to an XML file containing the body of the request.
     *
     * @param array $options
     *
     * @return string
     */
    public function sendRequest(array $options = [
        'request-yml' => InputOption::VALUE_REQUIRED,
    ])
    {
        $config = $this->getConfig();
        $wsdl_endpoint = $config->get('epoetry.wsdl_endpoint');

        $yaml = Yaml::parse(file_get_contents($options['request-yml']));

        $guzzle = new GuzzleClient();
        $adapter = new GuzzleAdapter($guzzle);

        $adapter = new Client();

        /** @var OpenEuropa\EPoetry\EPoetryClientFactory $factory */
        $factory = new EPoetryClientFactory($wsdl_endpoint, $adapter);

        /** @var OpenEuropa\EPoetry\Type\RequestGeneralInfoIn $generalInfo */
        $generalInfo = new RequestGeneralInfoIn();

        $generalInfo->setTitle('Test')
            ->setInternalReference('1')
            ->setInternalTechnicalId('1')
            ->setRequestedDeadline(new \DateTime('2020-02-02'))
            ->setSensitive(false)
            ->setDocumentToBeAdopted(true)
            ->setDecideReference('decideReference')
            ->setSentViaRUE(true)
            ->setDestinationCode('PUBLIC')
            ->setSlaAnnex('')
            ->setSlaCommitment('')
            ->setComment('')
            ->setOnBehalfOf('')
            ->setAccessibleTo('');

        // Generate Contacts.
        $contacts = new Contacts();

        $contact = new ContactPersonIn();
        $contact->setUserId('1');
        $contact->setRoleCode('AUTHOR');
        $contacts->addContact($contact);

        $contact = new ContactPersonIn();
        $contact->setUserId('2');
        $contact->setRoleCode('EDITOR');
        $contacts->addContact($contact);

        $linguisticRequestIn = new LinguisticRequestIn();
        $linguisticRequestIn->setContacts($contacts)
            ->setGeneralInfo($generalInfo);

        $createRequests = new CreateRequests();
        $createRequests->setLinguisticRequest($linguisticRequestIn);

        $response = $factory->getClient()->createRequests($createRequests);

        return $response;
    }
}
