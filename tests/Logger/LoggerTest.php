<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Logger;

use OpenEuropa\EPoetry\Tests\AbstractTest;
use OpenEuropa\EPoetry\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Type\Contacts;
use OpenEuropa\EPoetry\Type\CreateRequests;
use OpenEuropa\EPoetry\Type\LinguisticRequestIn;
use OpenEuropa\EPoetry\Type\RequestGeneralInfoIn;
use Psr\Log\LogLevel;

/**
 * @internal
 * @coversNothing
 */
final class LoggerTest extends AbstractTest
{
    /**
     * Test logging info and error events.
     */
    public function testErrorLogging()
    {
        // Generate request to be sent.
        $createRequests = $this->generateRequest();

        $exception = new \Exception('Request was not properly formatted.');
        $this->httpClient->addException($exception);

        $logger = new MockLogger();
        $clientFactory = $this->createClientFactory();
        $clientFactory->setLogger($logger);
        $clientFactory->setLogLevel(LogLevel::ERROR);
        $client = $clientFactory->getClient();

        try {
            $client->createRequests($createRequests);
        } catch (\Exception $e) {
            // Since we need to trigger some exceptions in order to log them
            // as errors, catch them and do nothing to continue the test.
        }

        $infoLogs = $logger->getLogs()[LogLevel::INFO];
        $this->assertCount(1, $infoLogs);
        $infoLog = reset($infoLogs);
        $this->assertEquals('[ePoetry] Request: call {method} with params {request}', $infoLog['message']);
        $this->assertEquals('createRequests', $infoLog['context']['method']);
        $this->assertInstanceOf(CreateRequests::class, $infoLog['context']['request']);
        $errorLogs = $logger->getLogs()[LogLevel::ERROR];
        $this->assertCount(1, $errorLogs);
        $errorLog = reset($errorLogs);
        $this->assertEquals('[ePoetry] Fault {message} for request {method} with params {request}', $errorLog['message']);
        $this->assertEquals('Request was not properly formatted.', $errorLog['context']['message']);
        $this->assertEquals('createRequests', $errorLog['context']['method']);
        $this->assertInstanceOf(CreateRequests::class, $errorLog['context']['request']);
    }

    /**
     * Test logging only info events.
     */
    public function testInfoLogging()
    {
        // Generate request to be sent.
        $createRequests = $this->generateRequest();

        $exception = new \Exception('Request was not properly formatted.');
        $this->httpClient->addException($exception);

        $logger = new MockLogger();
        $clientFactory = $this->createClientFactory();
        $clientFactory->setLogger($logger);
        $clientFactory->setLogLevel(LogLevel::INFO);
        $client = $clientFactory->getClient();

        try {
            $client->createRequests($createRequests);
        } catch (\Exception $e) {
            // Since we need to trigger some exceptions in order to log them
            // as errors, catch them and do nothing to continue the test.
        }

        $infoLogs = $logger->getLogs()[LogLevel::INFO];
        $this->assertCount(1, $infoLogs);
        $infoLog = reset($infoLogs);
        $this->assertEquals('[ePoetry] Request: call {method} with params {request}', $infoLog['message']);
        $this->assertEquals('createRequests', $infoLog['context']['method']);
        $this->assertInstanceOf(CreateRequests::class, $infoLog['context']['request']);
        $errorLogs = $logger->getLogs()[LogLevel::ERROR];
        $this->assertCount(0, $errorLogs);
    }

    /**
     * Generate a request object.
     */
    private function generateRequest(): CreateRequests
    {
        // Generate General Info.
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

        return $createRequests;
    }
}
