<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request\Traits;

use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\DocumentIn;
use OpenEuropa\EPoetry\Request\Type\DossierReference;
use OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn;
use OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn;
use OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\ReferenceDocuments;

/**
 * Test traits for ModifyLinguisticRequest.
 */
trait ModifyLinguisticRequestTrait
{
    /**
     * Gets test ModifyLinguisticRequest object.
     */
    protected function getModifyLinguisticRequest(): ModifyLinguisticRequest
    {
        $document = new DocumentIn();
        $document->setFileName('auxilary-file-IT-20210813.doc')
            ->setLanguage('ES')
            ->setComment('3rd attach')
            ->setContent('cid:aux');

        $referenceDocuments = new ReferenceDocuments();
        $referenceDocuments->addDocument($document);

        $auxiliaryDocuments = new ModifyAuxiliaryDocumentsIn();
        $auxiliaryDocuments->setReferenceDocuments($referenceDocuments);

        $requestDetails = new ModifyRequestDetailsIn();
        $requestDetails->setAuxiliaryDocuments($auxiliaryDocuments);
        $contacts = (new Contacts())
            ->addContact(new ContactPersonIn('smithjo', 'REQUESTER'))
            ->addContact(new ContactPersonIn('rossmi', 'REQUESTER'))
            ->addContact(new ContactPersonIn('rossmi', 'AUTHOR'))
            ->addContact(new ContactPersonIn('rossmi', 'RECIPIENT'));
        $requestDetails->setContacts($contacts);

        $productRequestIn = (new ModifyProductRequestIn())
            ->setLanguage('ES')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2021-11-13T23:59:00+02:00'))
            ->setTrackChanges(false);
        $products = (new Products())
            ->addProduct($productRequestIn);
        $requestDetails->setProducts($products);

        $dossierReference = (new DossierReference());
        $dossierReference->setRequesterCode('CA07')
            ->setNumber(1)
            ->setYear(2021);
        $requestReference = (new ModifyRequestReferenceIn());
        $requestReference->setDossier($dossierReference)
            ->setPart(0)
            ->setProductType('TRA');

        $modifyLinguisticRequestIn = new ModifyLinguisticRequestIn();
        $modifyLinguisticRequestIn->setRequestDetails($requestDetails);
        $modifyLinguisticRequestIn->setRequestReference($requestReference);

        return (new ModifyLinguisticRequest())
            ->setModifyLinguisticRequest($modifyLinguisticRequestIn)
            ->setApplicationName('EPOETRY');
    }
}
