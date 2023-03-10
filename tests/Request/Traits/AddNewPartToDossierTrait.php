<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request\Traits;

use OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier;
use OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\DocumentIn;
use OpenEuropa\EPoetry\Request\Type\DossierReference;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use OpenEuropa\EPoetry\Request\Type\ProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\ReferenceDocuments;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\SrcDocumentIn;

/**
 * Test traits for AddNewPartToDossier.
 */
trait AddNewPartToDossierTrait
{
    /**
     * Gets test AddNewPartToDossier object.
     */
    protected function getAddNewPartToDossier(): AddNewPartToDossier
    {
        $document1 = new DocumentIn();
        $document1->setFileName('test.doc')
            ->setLanguage('FR')
            ->setComment('test')
            ->setContent('cid:303605824112');

        $document2 = new DocumentIn();
        $document2->setFileName('test_FI.doc')
            ->setLanguage('FI')
            ->setComment('testFI')
            ->setContent('cid:303605824112');

        $referenceDocuments = new ReferenceDocuments();
        $referenceDocuments->addDocument($document1);
        $referenceDocuments->addDocument($document2);

        $srcDocument = new SrcDocumentIn();
        $srcDocument->setFileName('testSRC.docx')
            ->setComment('77777')
            ->setContent('cid:1531884704226');

        $auxiliaryDocuments = new AuxiliaryDocumentsIn();
        $auxiliaryDocuments->setReferenceDocuments($referenceDocuments)
            ->setSrcDocument($srcDocument);

        $dossierReference = (new DossierReference())
            ->setRequesterCode('DIGIT')
            ->setNumber(17)
            ->setYear(2020);

        $requestDetails = new RequestDetailsIn();
        $requestDetails->setTitle('test JL')
            ->setWorkflowCode('')
            ->setInternalReference('')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2021-06-04T10:59:00+02:00'))
            ->setSensitive(false)
            ->setSentViaRue(false)
            ->setDocumentToAdopt(false)
            ->setDecideReference('')
            ->setDestination('PUBLIC')
            ->setProcedure('DEGHP')
            ->setSlaAnnex('ANNEX8B')
            ->setSlaCommitment('SI2.822223.1.B2020')
            ->setComment('my request')
            ->setAccessibleTo('CONTACTS')
            ->setKeyword1('1111')
            ->setKeyword2('2222')
            ->setKeyword3('3333')
            ->setAuxiliaryDocuments($auxiliaryDocuments);

        $contacts = (new Contacts())
            ->addContact(new ContactPersonIn('teodomi', 'REQUESTER'))
            ->addContact(new ContactPersonIn('smithjo', 'AUTHOR'))
            ->addContact(new ContactPersonIn('smithjo', 'RECIPIENT'));
        $requestDetails->setContacts($contacts);

        $linguisticSections = (new LinguisticSections())
            ->addLinguisticSection(new LinguisticSectionIn('DE'));
        $originalDocument = (new OriginalDocumentIn())
            ->setFileName('TEST_ORI.docx')
            ->setComment('')
            ->setContent('')
            ->setLinguisticSections($linguisticSections);
        $requestDetails->setOriginalDocument($originalDocument);

        $productRequest = (new ProductRequestIn())
            ->setLanguage('FI');
        $products = new Products();
        $products->addProduct($productRequest);
        $productRequest = (new ProductRequestIn())
            ->setLanguage('RO');
        $products->addProduct($productRequest);
        $productRequest = (new ProductRequestIn())
            ->setLanguage('BG');
        $products->addProduct($productRequest);
        $productRequest = (new ProductRequestIn())
            ->setLanguage('FR');
        $products->addProduct($productRequest);
        $productRequest = (new ProductRequestIn())
            ->setLanguage('SE');
        $products->addProduct($productRequest);
        $requestDetails->setProducts($products);

        return (new AddNewPartToDossier())
            ->setDossier($dossierReference)
            ->setRequestDetails($requestDetails)
            ->setApplicationName('application1');
    }
}
