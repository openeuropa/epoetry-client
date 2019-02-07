<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Type\Contacts;
use OpenEuropa\EPoetry\Type\CreateRequests;
use OpenEuropa\EPoetry\Type\CreateRequestsResponse;
use OpenEuropa\EPoetry\Type\LinguisticRequestIn;
use OpenEuropa\EPoetry\Type\RequestGeneralInfoIn;

/**
 * @internal
 * @coversNothing
 */
final class RequestTest extends AbstractTest
{
    /**
     * Test a SOAP request.
     */
    public function testRequestSending()
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

        $content = file_get_contents(self::FIXTURE_DIR . '/create-requests-response.xml');
        $response = new Response(200, [], $content);
        $this->httpClient->addResponse($response);

        $client = $this->createClientFactory()->getClient();
        $client->createRequests($createRequests);

        $request = $client->debugLastSoapRequest()['request'];

        $this->assertContains('<title>Test</title>', $request['body']);
        $this->assertContains('<contact userId="1" roleCode="AUTHOR"/>', $request['body']);
        $this->assertContains('<contact userId="2" roleCode="EDITOR"/>', $request['body']);
    }

    /**
     * Test parsing a SOAP response.
     */
    public function testResponseParsing()
    {
        $content = file_get_contents(self::FIXTURE_DIR . '/create-requests-response.xml');
        $response = new Response(200, [], $content);
        $this->httpClient->addResponse($response);

        $createRequests = new CreateRequests();
        $response = $this->createClientFactory()
            ->getClient()
            ->createRequests($createRequests);

        $this->assertInstanceOf(CreateRequestsResponse::class, $response);
        $this->assertCount(2, $response->getReturn());

        // Assert first linguistic request return.
        $return = $response->getReturn()[0];
        $this->assertSame('ENV', $return->getStatusCode());

        // Assert auxiliary documents.
        $auxiliaryDocuments = $return->getAuxiliaryDocuments()->getAuxiliaryDocument();
        $this->assertCount(2, $auxiliaryDocuments);

        $auxiliaryDocument = $auxiliaryDocuments[0];
        $this->assertSame('RO', $auxiliaryDocument->getLanguage());
        $this->assertSame('TXT', $auxiliaryDocument->getFormat());
        $this->assertSame('REF', $auxiliaryDocument->getType());
        $this->assertSame('test1.txt', $auxiliaryDocument->getName());

        $auxiliaryDocument = $auxiliaryDocuments[1];
        $this->assertSame('ML', $auxiliaryDocument->getLanguage());
        $this->assertSame('TXT', $auxiliaryDocument->getFormat());
        $this->assertSame('REF', $auxiliaryDocument->getType());
        $this->assertSame('test1.txt', $auxiliaryDocument->getName());

        // Assert contact persons.
        $contacts = $return->getContacts()->getContact();
        $this->assertCount(2, $contacts);

        $contact = $contacts[0];
        $this->assertSame('', $contact->getEmail());
        $this->assertSame('Paolo', $contact->getFirstName());
        $this->assertSame('Levi', $contact->getLastName());
        $this->assertSame('REQUESTER', $contact->getRoleCode());
        $this->assertSame('paolevi', $contact->getUserId());

        $contact = $contacts[1];
        $this->assertSame('', $contact->getEmail());
        $this->assertSame('Angela', $contact->getFirstName());
        $this->assertSame('Heda', $contact->getLastName());
        $this->assertSame('AUTHOR', $contact->getRoleCode());
        $this->assertSame('angheda', $contact->getUserId());

        // Assert general info.
        $generalInfo = $return->getGeneralInfo();
        $this->assertSame('DIR', $generalInfo->getAccessibleTo());
        $this->assertSame('comment', $generalInfo->getComment());
        $this->assertNull($generalInfo->getDecideReference());
        $this->assertSame('INTERNE', $generalInfo->getDestinationCode());
        $this->assertSame('MYREF-DEF-123456', $generalInfo->getInternalReference());
        $this->assertNull($generalInfo->getInternalTechnicalId());
        $this->assertNull($generalInfo->getOnBehalfOf());
        $this->assertNull($generalInfo->getRequestingService());
        $this->assertNull($generalInfo->getServiceOfOrigin());
        $this->assertSame('ANNEX8B', $generalInfo->getSlaAnnex());
        $this->assertNull($generalInfo->getSlaCommitment());
        $this->assertSame('Title of the Document', $generalInfo->getTitle());
        $this->assertSame('2018-11-30', $generalInfo->getRequestedDeadline()->format('Y-m-j'));

        // Assert original document.
        $originalDocument = $return->getOriginalDocument();
        // @todo: change getPages() return type to "int".
        $this->assertSame(0, (int) $originalDocument->getPages());
        $this->assertFalse($originalDocument->isTrackChanges());
        $this->assertSame('TXT', $originalDocument->getFormat());
        $this->assertSame('test1.txt', $originalDocument->getName());
        $this->assertSame('ORI', $originalDocument->getType());

        // Assert language sections.
        $languageSections = $originalDocument->getLinguisticSections()->getLinguisticSection();
        $this->assertCount(2, $languageSections);
        $this->assertSame('FR', $languageSections[0]->getLanguage()->getCode());
        $this->assertSame('EN', $languageSections[1]->getLanguage()->getCode());

        // Assert product requests.
        $productRequests = $return->getProductRequests()->getProductRequest();
        $this->assertCount(5, $productRequests);

        $this->assertNull($productRequests[0]->getAcceptedDeadline());
        $this->assertSame('NA', $productRequests[0]->getFormatCode());
        $this->assertNull($productRequests[0]->getInternalProductReference());
        $this->assertSame('ENV', $productRequests[0]->getStatusCode());
        $this->assertFalse($productRequests[0]->isTrackChanges());
        $this->assertSame('EN', $productRequests[0]->getLanguage()->getCode());
        $this->assertSame('2019-11-15', $productRequests[0]->getRequestedDeadline()->format('Y-m-j'));

        $this->assertNull($productRequests[1]->getAcceptedDeadline());
        $this->assertSame('NA', $productRequests[1]->getFormatCode());
        $this->assertNull($productRequests[1]->getInternalProductReference());
        $this->assertSame('ENV', $productRequests[1]->getStatusCode());
        $this->assertFalse($productRequests[1]->isTrackChanges());
        $this->assertSame('DE', $productRequests[1]->getLanguage()->getCode());
        $this->assertSame('2019-11-15', $productRequests[1]->getRequestedDeadline()->format('Y-m-j'));

        $this->assertNull($productRequests[2]->getAcceptedDeadline());
        $this->assertSame('NA', $productRequests[2]->getFormatCode());
        $this->assertNull($productRequests[2]->getInternalProductReference());
        $this->assertSame('ENV', $productRequests[2]->getStatusCode());
        $this->assertFalse($productRequests[2]->isTrackChanges());
        $this->assertSame('CS', $productRequests[2]->getLanguage()->getCode());
        $this->assertSame('2019-04-15', $productRequests[2]->getRequestedDeadline()->format('Y-m-j'));

        $this->assertNull($productRequests[3]->getAcceptedDeadline());
        $this->assertSame('NA', $productRequests[3]->getFormatCode());
        $this->assertNull($productRequests[3]->getInternalProductReference());
        $this->assertSame('ENV', $productRequests[3]->getStatusCode());
        $this->assertFalse($productRequests[3]->isTrackChanges());
        $this->assertSame('FR', $productRequests[3]->getLanguage()->getCode());
        $this->assertSame('2019-11-15', $productRequests[3]->getRequestedDeadline()->format('Y-m-j'));

        $this->assertNull($productRequests[4]->getAcceptedDeadline());
        $this->assertSame('NA', $productRequests[4]->getFormatCode());
        $this->assertNull($productRequests[4]->getInternalProductReference());
        $this->assertSame('ENV', $productRequests[4]->getStatusCode());
        $this->assertFalse($productRequests[4]->isTrackChanges());
        $this->assertSame('BG', $productRequests[4]->getLanguage()->getCode());
        $this->assertNull($productRequests[4]->getRequestedDeadline());

        // Assert reference.
        $reference = $return->getReference();
        $this->assertSame(1738, $reference->getId());
        $this->assertSame('MYREF-DEF-123456', $reference->getInternalReference());
        $this->assertNull($reference->getInternalTechnicalId());
        $this->assertSame(2249, $reference->getNumber());
        $this->assertSame(0, $reference->getPart());
        $this->assertSame('TRA', $reference->getProductType());
        $this->assertSame('DGT', $reference->getRequesterCode());
        $this->assertSame(0, $reference->getVersion());
        $this->assertSame(2018, $reference->getYear());

        // Assert status code.
        $this->assertSame('ENV', $return->getStatusCode());
    }
}
