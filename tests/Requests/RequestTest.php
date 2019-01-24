<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use OpenEuropa\EPoetry\Tests\Middleware\MockMiddleware;
use OpenEuropa\EPoetry\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Type\Contacts;
use OpenEuropa\EPoetry\Type\RequestGeneralInfoIn;

/**
 * @internal
 * @coversNothing
 */
final class RequestTest extends AbstractTest
{
    public function testRequest()
    {
        $this->clientFactory->addMiddleware(new MockMiddleware());

        // Generate General Info.
        $generalInfo = new RequestGeneralInfoIn();
        $title = 'Test';
        $generalInfo->setTitle($title)
            ->setInternalReference('1')
            ->setInternalTechnicalId('1')
            ->setRequestedDeadline(new \DateTime('2020-02-02'))
            ->setSensitive(false)
            ->setDocumentToBeAdopted(true)
            ->setDecideReference('decideReference')
            ->setSentViaRUE(true)
            // @todo get value from lib.
            ->setDestinationCode('PUBLIC')
            // @todo get value from lib.
            ->setSlaAnnex('')
            ->setSlaCommitment('')
            ->setComment('')
            ->setOnBehalfOf('')
            ->setAccessibleTo('');
        $this->assertSame($generalInfo->getTitle(), $title);

        // Generate Contacts.
        $contacts = new Contacts();
        $contact = new ContactPersonIn();
        $contact->setUserId('1');
        $contact->setRoleCode('AUTHOR');
        $contacts = $contacts->addContact($contact);
        $contact = new ContactPersonIn();
        $contact->setUserId('2');
        $contact->setRoleCode('EDITOR');
        $contacts = $contacts->addContact($contact);
        $this->assertSame($contacts->getContact()[0]->getUserId(), '1');
    }
}
