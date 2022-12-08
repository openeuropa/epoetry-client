<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\DocumentIn;
use OpenEuropa\EPoetry\Request\Type\DossierReference;
use OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
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
            ->addContact(new ContactPersonIn('liekejo', 'REQUESTER'))
            ->addContact(new ContactPersonIn('liekejo', 'AUTHOR'))
            ->addContact(new ContactPersonIn('liekejo', 'RECIPIENT'));
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
            ->addContact(new ContactPersonIn('liekejo', 'REQUESTER'))
            ->addContact(new ContactPersonIn('aniskja', 'AUTHOR'))
            ->addContact(new ContactPersonIn('liekejo', 'RECIPIENT'));
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
