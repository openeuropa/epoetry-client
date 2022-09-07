<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\DocumentIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut;
use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
use OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use OpenEuropa\EPoetry\Request\Type\ProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\ProductRequestOut;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\ReferenceDocuments;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsOut;
use OpenEuropa\EPoetry\Request\Type\SrcDocumentIn;
use OpenEuropa\EPoetry\Serializer\Serializer;
use Phpro\SoapClient\Type\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * Test Serializer.
 */
final class SerializerTest extends TestCase
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->serializer = new Serializer();

        // Create a request object for the tests.
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
            ->addLinguisticSection(new LinguisticSectionOut('FR'));
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

        $this->request = (new CreateLinguisticRequest())
            ->setRequestDetails($requestDetails)
            ->setApplicationName('appname')
            ->setTemplateName('DEFAULT');
    }

    /**
     * Test serialization/deserialization to/from JSON.
     */
    public function testJson(): void
    {
        $output = $this->serializer->toString($this->request, 'json');
        $json = '{"requestDetails":{"title":"Request title","requestedDeadline":"2022-07-01T11:51:00+01:00","sensitive":false,"destination":"PUBLIC","procedure":"DEGHP","slaAnnex":"ANNEX8A","slaCommitment":"2225555","comment":"comment","accessibleTo":"CONTACTS","keyword1":"keyword1","keyword2":"keyword2","keyword3":"keyword3","contacts":{"contact":[{"userId":"liekejo","contactRole":"REQUESTER"},{"userId":"liekejo","contactRole":"AUTHOR"},{"userId":"liekejo","contactRole":"RECIPIENT"}]},"originalDocument":{"fileName":"TEST_FILE_ORIGINALP.docx","comment":"","content":"cid:267736828531","linguisticSections":{"linguisticSection":[{"language":"FR"}]},"trackChanges":false},"products":{"product":[{"language":"FR","requestedDeadline":"2021-07-06T11:51:00+01:00","trackChanges":false}]},"auxiliaryDocuments":{"referenceDocuments":{"document":[{"fileName":"test.docx","language":"EN","comment":"test","content":"cid:303605824112"}]},"srcDocument":{"fileName":"test2222SRC.docx","comment":"777888877","content":"cid:1531884704226"}}},"applicationName":"appname","templateName":"DEFAULT"}';
        $this->assertEquals($json, $output);

        $requestDeserialized = $this->serializer->fromString($json, CreateLinguisticRequest::class, 'json');
        $this->assertEquals($this->request, $requestDeserialized);
    }

    /**
     * Test serialization/deserialization to/from YAML.
     */
    public function testYaml(): void
    {
        $output = $this->serializer->toString($this->request, 'yaml');
        $yaml = "{ requestDetails: { title: 'Request title', requestedDeadline: '2022-07-01T11:51:00+01:00', sensitive: false, destination: PUBLIC, procedure: DEGHP, slaAnnex: ANNEX8A, slaCommitment: '2225555', comment: comment, accessibleTo: CONTACTS, keyword1: keyword1, keyword2: keyword2, keyword3: keyword3, contacts: { contact: [{ userId: liekejo, contactRole: REQUESTER }, { userId: liekejo, contactRole: AUTHOR }, { userId: liekejo, contactRole: RECIPIENT }] }, originalDocument: { fileName: TEST_FILE_ORIGINALP.docx, comment: '', content: 'cid:267736828531', linguisticSections: { linguisticSection: [{ language: FR }] }, trackChanges: false }, products: { product: [{ language: FR, requestedDeadline: '2021-07-06T11:51:00+01:00', trackChanges: false }] }, auxiliaryDocuments: { referenceDocuments: { document: [{ fileName: test.docx, language: EN, comment: test, content: 'cid:303605824112' }] }, srcDocument: { fileName: test2222SRC.docx, comment: '777888877', content: 'cid:1531884704226' } } }, applicationName: appname, templateName: DEFAULT }";
        $this->assertEquals($yaml, $output);

        $requestDeserialized = $this->serializer->fromString($yaml, CreateLinguisticRequest::class, 'yaml');
        $this->assertEquals($this->request, $requestDeserialized);
    }

    /**
     * Test normalization/denormalization to/from array.
     */
    public function testArray(): void
    {
        $output = $this->serializer->toArray($this->request);
        $this->assertEquals($this->getCreateLinguisticRequestArray(), $output);

        $requestDenormalized = $this->serializer->fromArray($this->getCreateLinguisticRequestArray(), CreateLinguisticRequest::class);
        $this->assertEquals($this->request, $requestDenormalized);
    }

    /**
     * Test ProductsDenormalizer.
     */
    public function testProductsDenormalizer(): void
    {
        // Denormalized string object has to be the same as constructed class.
        $productRequestOut1 = new ProductRequestOut();
        $productRequestOut1->setLanguage('FR');
        $productRequestOut1->setStatus('Ongoing');
        $productRequestOut1->setTrackChanges(true);
        $productRequestOut1->setFormat('DOC');
        $productRequestOut1->setAcceptedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2022-07-01T11:51:00+01:00'));

        $productRequestOut2 = new ProductRequestOut();
        $productRequestOut2->setLanguage('EN');
        $productRequestOut2->setStatus('Accepted');
        $productRequestOut2->setTrackChanges(false);
        $productRequestOut2->setFormat('DOCX');
        $productRequestOut2->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2022-08-01T11:51:00+01:00'));

        $products = new Products();
        $products->addProduct($productRequestOut1);
        $products->addProduct($productRequestOut2);

        $requestDetailsOut = new RequestDetailsOut();
        $requestDetailsOut->setProducts($products);

        $yaml = "{ products: { product: [{ language: FR, acceptedDeadline: '2022-07-01T11:51:00+01:00', trackChanges: true, status: Ongoing, format: DOC }, { language: EN, requestedDeadline: '2022-08-01T11:51:00+01:00', trackChanges: false, status: Accepted, format: DOCX }] } }";
        $denormalizedObject = $this->serializer->fromString($yaml, RequestDetailsOut::class, 'yaml');
        $this->assertEquals($requestDetailsOut, $denormalizedObject);

        // Denormalized to ModifyRequestDetailsIn object should contain ModifyProductRequestIn.
        $denormalizedObject = $this->serializer->fromString($yaml, ModifyRequestDetailsIn::class, 'yaml');
        $products = $denormalizedObject->getProducts()->getProduct();
        $this->assertCount(2, $products);
        foreach ($products as $product) {
            $this->assertInstanceOf(ModifyProductRequestIn::class, $product);
        }
    }

    /**
     * Gets normalized array of CreateLinguisticRequest object as expected result.
     *
     * @return array
     */
    protected function getCreateLinguisticRequestArray(): array
    {
        return [
            'requestDetails' => [
                'title' => 'Request title',
                'requestedDeadline' => '2022-07-01T11:51:00+01:00',
                'sensitive' => false,
                'destination' => 'PUBLIC',
                'procedure' => 'DEGHP',
                'slaAnnex' => 'ANNEX8A',
                'slaCommitment' => '2225555',
                'comment' => 'comment',
                'accessibleTo' => 'CONTACTS',
                'keyword1' => 'keyword1',
                'keyword2' => 'keyword2',
                'keyword3' => 'keyword3',
                'contacts' => [
                    'contact' => [
                        [
                            'userId' => 'liekejo',
                            'contactRole' => 'REQUESTER',
                        ], [
                            'userId' => 'liekejo',
                            'contactRole' => 'AUTHOR',
                        ], [
                            'userId' => 'liekejo',
                            'contactRole' => 'RECIPIENT',
                        ]
                    ],
                ],
                'originalDocument' => [
                    'fileName' => 'TEST_FILE_ORIGINALP.docx',
                    'comment' => '',
                    'content' => 'cid:267736828531',
                    'linguisticSections' => [
                        'linguisticSection' => [
                            [
                                'language' => 'FR',
                            ],
                        ],
                    ],
                    'trackChanges' => false,
                ],
                'products' => [
                    'product' => [
                        [
                            'language' => 'FR',
                            'requestedDeadline' => '2021-07-06T11:51:00+01:00',
                            'trackChanges' => false,
                        ]
                    ]
                ],
                'auxiliaryDocuments' => [
                    'referenceDocuments' => [
                        'document' => [
                            [
                                'fileName' => 'test.docx',
                                'language' => 'EN',
                                'comment' => 'test',
                                'content' => 'cid:303605824112',
                            ],
                        ],
                    ],
                    'srcDocument' => [
                        'fileName' => 'test2222SRC.docx',
                        'comment' => '777888877',
                        'content' => 'cid:1531884704226',
                    ],
                ],
            ],
            'applicationName' => 'appname',
            'templateName' => 'DEFAULT',
        ];
    }
}
