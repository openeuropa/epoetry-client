<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request\Traits;

use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\DossierReference;
use OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use OpenEuropa\EPoetry\Request\Type\ProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\RequestReferenceIn;
use OpenEuropa\EPoetry\Request\Type\ResubmitRequest;

/**
 * Test traits for ResubmitRequest.
 */
trait ResubmitRequestTrait
{
    /**
     * Gets test ResubmitRequest object.
     */
    protected function getResubmitRequest(): ResubmitRequest
    {
        $requestDetails = new RequestDetailsIn();
        $requestDetails->setTitle('Resubmission - JL')
            ->setInternalReference('')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2021-10-10T11:51:00+01:00'))
            ->setDocumentToAdopt(false)
            ->setDecideReference('')
            ->setDestination('PUBLIC')
            ->setProcedure('DEGHP')
            ->setSlaAnnex('ANNEX8A')
            ->setSlaCommitment('2225555')
            ->setComment('my request - resubmitted')
            ->setAccessibleTo('CONTACTS')
            ->setKeyword1('ACC test - resubmitted')
            ->setKeyword2('key2 - resubmitted')
            ->setKeyword3('aaaaaaaaaaaaaaa - resubmitted');

        $contacts = (new Contacts())
            ->addContact(new ContactPersonIn('smithjo', 'REQUESTER'))
            ->addContact(new ContactPersonIn('aniskja', 'AUTHOR'))
            ->addContact(new ContactPersonIn('smithjo', 'RECIPIENT'));
        $requestDetails->setContacts($contacts);

        $linguisticSections = (new LinguisticSections())
            ->addLinguisticSection(new LinguisticSectionIn('PL'));
        $originalDocument = (new OriginalDocumentIn())
            ->setFileName('ORI-resubmitted-PL.docx')
            ->setComment('Ori doc resubmitted')
            ->setContent('cid:ori-resubmitted')
            ->setLinguisticSections($linguisticSections);
        $requestDetails->setOriginalDocument($originalDocument);

        $productRequest = (new ProductRequestIn())
            ->setLanguage('FR')
            ->setTrackChanges(false);
        $products = (new Products())
            ->addProduct($productRequest);
        $requestDetails->setProducts($products);

        $linguisticRequest = new LinguisticRequestIn();
        $linguisticRequest->setRequestDetails($requestDetails);
        $dossierReference = (new DossierReference());
        $dossierReference->setRequesterCode('CA07')
            ->setNumber(3)
            ->setYear(2021);
        $requestReference = (new RequestReferenceIn());
        $requestReference->setDossier($dossierReference)
            ->setPart(0)
            ->setProductType('TRA');
        $linguisticRequest->setRequestReference($requestReference);

        return (new ResubmitRequest())
            ->setResubmitRequest($linguisticRequest)
            ->setApplicationName('EPOETRY')
            ->setTemplateName('DEFAULT');
    }
}
