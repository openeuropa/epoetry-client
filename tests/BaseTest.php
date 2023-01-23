<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier;
use OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\DocumentIn;
use OpenEuropa\EPoetry\Request\Type\DossierReference;
use OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
use OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn;
use OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn;
use OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use OpenEuropa\EPoetry\Request\Type\ProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\ReferenceDocuments;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\RequestReferenceIn;
use OpenEuropa\EPoetry\Request\Type\ResubmitRequest;
use OpenEuropa\EPoetry\Request\Type\SrcDocumentIn;
use OpenEuropa\EPoetry\Serializer\Serializer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Base test class.
 */
abstract class BaseTest extends TestCase
{
    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var ExpressionLanguage
     */
    protected $expressionLanguage;

    /**
     * @var ValidatorInterface
     */
    protected ValidatorInterface $validator;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->serializer = new Serializer();

        // Setup expression language service.
        $this->expressionLanguage = new ExpressionLanguage();
        $this->expressionLanguage->addFunction(ExpressionFunction::fromPhp('count'));
        $this->expressionLanguage->addFunction(ExpressionFunction::fromPhp('is_a'));
        $this->expressionLanguage->addFunction(ExpressionFunction::fromPhp('strpos'));

        parent::setUp();
    }

    /**
     * Gets parsed fixture content.
     *
     * @param string $filename
     *
     * @return array
     */
    public function getFixture(string $filename, $dir = ''): array
    {
        return Yaml::parse(file_get_contents(__DIR__ . $dir .  '/fixtures/' . $filename));
    }

    /**
     * Assert a list of Expression Language expressions.
     *
     * @param array $expressions
     * @param array $values
     */
    protected function assertExpressionLanguageExpressions(array $expressions, array $values): void
    {
        foreach ($expressions as $expression) {
            static::assertTrue(
                $this->expressionLanguage->evaluate(
                    $expression,
                    $values
                ),
                sprintf('The expression [%s] failed to evaluate to true.', $expression)
            );
        }
    }

    /**
     * Gets test CreateLinguisticRequest object.
     */
    protected function getCreateLinguisticRequest(): CreateLinguisticRequest
    {
        $document = new DocumentIn();
        $document->setFileName('test.docx')
            ->setLanguage('EN')
            ->setComment('test')
            ->setContent('cid:303605824112');

        $referenceDocuments = new ReferenceDocuments();
        $referenceDocuments->addDocument($document);

        $srcDocument = new SrcDocumentIn();
        $srcDocument->setFileName('test2222SRC.docx')
            ->setComment('777888877')
            ->setContent('cid:1531884704226');

        $auxiliaryDocuments = new AuxiliaryDocumentsIn();
        $auxiliaryDocuments->setReferenceDocuments($referenceDocuments)
            ->setSrcDocument($srcDocument);

        $requestDetails = new RequestDetailsIn();
        $requestDetails->setTitle('Request title')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2022-07-01T11:51:00+01:00'))
            ->setSensitive(false)
            ->setDestination('PUBLIC')
            ->setProcedure('DEGHP')
            ->setSlaAnnex('ANNEX8A')
            ->setSlaCommitment('2225555')
            ->setComment('comment')
            ->setAccessibleTo('CONTACTS')
            ->setKeyword1('keyword1')
            ->setKeyword2('keyword2')
            ->setKeyword3('keyword3')
            ->setAuxiliaryDocuments($auxiliaryDocuments);
        $contacts = (new Contacts())
            ->addContact(new ContactPersonIn('smithjo', 'REQUESTER'))
            ->addContact(new ContactPersonIn('smithjo', 'AUTHOR'))
            ->addContact(new ContactPersonIn('smithjo', 'RECIPIENT'));
        $requestDetails->setContacts($contacts);

        $linguisticSections = (new LinguisticSections())
            ->addLinguisticSection(new LinguisticSectionIn('FR'));
        $originalDocument = (new OriginalDocumentIn())
            ->setTrackChanges(false)
            ->setFileName('TEST_FILE_ORIGINALP.docx')
            ->setContent('cid:267736828531')
            ->setLinguisticSections($linguisticSections)
            ->setComment('');
        $requestDetails->setOriginalDocument($originalDocument);

        $productRequestIn = (new ProductRequestIn())
            ->setLanguage('FR')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2021-07-06T11:51:00+01:00'))
            ->setTrackChanges(false);
        $products = (new Products())
            ->addProduct($productRequestIn);
        $requestDetails->setProducts($products);

        return (new CreateLinguisticRequest())
            ->setRequestDetails($requestDetails)
            ->setApplicationName('appname')
            ->setTemplateName('DEFAULT');
    }

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
            ->setApplicationName('application1')
            ->setTemplateName('DEFAULT');
    }
}
