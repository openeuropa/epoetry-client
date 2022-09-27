<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests;

use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\ContactPersonOut;
use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut;
use OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut;
use OpenEuropa\EPoetry\Request\Type\ProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\ProductRequestOut;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsOut;

/**
 * Test Serializer.
 */
final class SerializerTest extends BaseTest
{
    /**
     * Test serialization/deserialization to/from JSON.
     */
    public function testJson(): void
    {
        $request = $this->getCreateLinguisticRequest();
        $output = $this->serializer->toString($request, 'json');
        $json = '{"requestDetails":{"title":"Request title","requestedDeadline":"2022-07-01T11:51:00+01:00","sensitive":false,"destination":"PUBLIC","procedure":"DEGHP","slaAnnex":"ANNEX8A","slaCommitment":"2225555","comment":"comment","accessibleTo":"CONTACTS","keyword1":"keyword1","keyword2":"keyword2","keyword3":"keyword3","contacts":{"contact":[{"userId":"liekejo","contactRole":"REQUESTER"},{"userId":"liekejo","contactRole":"AUTHOR"},{"userId":"liekejo","contactRole":"RECIPIENT"}]},"originalDocument":{"fileName":"TEST_FILE_ORIGINALP.docx","comment":"","content":"cid:267736828531","linguisticSections":{"linguisticSection":[{"language":"FR"}]},"trackChanges":false},"products":{"product":[{"language":"FR","requestedDeadline":"2021-07-06T11:51:00+01:00","trackChanges":false}]},"auxiliaryDocuments":{"referenceDocuments":{"document":[{"fileName":"test.docx","language":"EN","comment":"test","content":"cid:303605824112"}]},"srcDocument":{"fileName":"test2222SRC.docx","comment":"777888877","content":"cid:1531884704226"}}},"applicationName":"appname","templateName":"DEFAULT"}';
        $this->assertEquals($json, $output);

        $requestDeserialized = $this->serializer->fromString($json, CreateLinguisticRequest::class, 'json');
        $this->assertEquals($request, $requestDeserialized);
    }

    /**
     * Test serialization/deserialization to/from YAML.
     */
    public function testYaml(): void
    {
        $request = $this->getCreateLinguisticRequest();
        $output = $this->serializer->toString($request, 'yaml');
        $yaml = "{ requestDetails: { title: 'Request title', requestedDeadline: '2022-07-01T11:51:00+01:00', sensitive: false, destination: PUBLIC, procedure: DEGHP, slaAnnex: ANNEX8A, slaCommitment: '2225555', comment: comment, accessibleTo: CONTACTS, keyword1: keyword1, keyword2: keyword2, keyword3: keyword3, contacts: { contact: [{ userId: liekejo, contactRole: REQUESTER }, { userId: liekejo, contactRole: AUTHOR }, { userId: liekejo, contactRole: RECIPIENT }] }, originalDocument: { fileName: TEST_FILE_ORIGINALP.docx, comment: '', content: 'cid:267736828531', linguisticSections: { linguisticSection: [{ language: FR }] }, trackChanges: false }, products: { product: [{ language: FR, requestedDeadline: '2021-07-06T11:51:00+01:00', trackChanges: false }] }, auxiliaryDocuments: { referenceDocuments: { document: [{ fileName: test.docx, language: EN, comment: test, content: 'cid:303605824112' }] }, srcDocument: { fileName: test2222SRC.docx, comment: '777888877', content: 'cid:1531884704226' } } }, applicationName: appname, templateName: DEFAULT }";
        $this->assertEquals($yaml, $output);

        $requestDeserialized = $this->serializer->fromString($yaml, CreateLinguisticRequest::class, 'yaml');
        $this->assertEquals($request, $requestDeserialized);
    }

    /**
     * Test normalization/denormalization to/from array.
     */
    public function testArray(): void
    {
        $request = $this->getCreateLinguisticRequest();
        $output = $this->serializer->toArray($request);
        $this->assertEquals($this->getCreateLinguisticRequestArray(), $output);

        $requestDenormalized = $this->serializer->fromArray($this->getCreateLinguisticRequestArray(), CreateLinguisticRequest::class);
        $this->assertEquals($request, $requestDenormalized);
    }

    /**
     * Test ProductsDenormalizer.
     */
    public function testProductsDenormalizer(): void
    {
        $yaml = "{ products: { product: [{ language: FR, acceptedDeadline: '2022-07-01T11:51:00+01:00', trackChanges: true, status: Ongoing, format: DOC }, { language: EN, requestedDeadline: '2022-08-01T11:51:00+01:00', trackChanges: false, status: Accepted, format: DOCX }] } }";

        // Assert creation of children classes based on type of denormalized object.
        $this->assertProducts($yaml, RequestDetailsOut::class, ProductRequestOut::class);
        $this->assertProducts($yaml, RequestDetailsIn::class, ProductRequestIn::class);
        $this->assertProducts($yaml, ModifyRequestDetailsIn::class, ModifyProductRequestIn::class);
    }

    /**
     * Asserts denormalization of OpenEuropa\EPoetry\Request\Type\Products object.
     */
    protected function assertProducts(string $yaml, string $type, string $expectedInstance): void
    {
        $denormalizedObject = $this->serializer->fromString($yaml, $type, 'yaml');
        $this->assertInstanceOf($type, $denormalizedObject);
        $products = $denormalizedObject->getProducts()->getProduct();
        $this->assertCount(2, $products);
        foreach ($products as $product) {
            $this->assertInstanceOf($expectedInstance, $product);
        }
    }

    /**
     * Tests LinguisticSectionsDenormalizer.
     */
    public function testLinguisticSectionsDenormalizer(): void
    {
        $yaml = "{ linguisticSections: { linguisticSection: [{ language: FR }] } }";

        // Assert creation of children classes based on type of denormalized object.
        $this->assertLinguisticSections($yaml, OriginalDocumentOut::class, LinguisticSectionOut::class);
        $this->assertLinguisticSections($yaml, OriginalDocumentIn::class, LinguisticSectionIn::class);
    }

    /**
     * Asserts denormalization of OpenEuropa\EPoetry\Request\Type\LinguisticSections object.
     */
    protected function assertLinguisticSections(string $yaml, string $type, string $expectedInstance): void
    {
        $denormalizedObject = $this->serializer->fromString($yaml, $type, 'yaml');
        $this->assertInstanceOf($type, $denormalizedObject);
        $linguisticSection = $denormalizedObject->getLinguisticSections()->getLinguisticSection();
        $this->assertInstanceOf($expectedInstance, reset($linguisticSection));
    }

    /**
     * Tests ContactsDenormalizer.
     */
    public function testContactsDenormalizer(): void
    {
        // Assert creation of children classes based on type of denormalized object.
        $yaml = "{ contacts: { contact: [{ firstName: First, lastName: Last, email: test@example.com, userId: userId, roleCode: code }] } }";
        $this->assertContacts($yaml, RequestDetailsOut::class, ContactPersonOut::class);

        $yaml = "{ contacts: { contact: [{ userId: userId, contactRole: role }] } }";
        $this->assertContacts($yaml, RequestDetailsIn::class, ContactPersonIn::class);
        $this->assertContacts($yaml, ModifyRequestDetailsIn::class, ContactPersonIn::class);
    }

    /**
     * Asserts denormalization of OpenEuropa\EPoetry\Request\Type\Contacts object.
     */
    protected function assertContacts(string $yaml, string $type, string $expectedInstance): void
    {
        $denormalizedObject = $this->serializer->fromString($yaml, $type, 'yaml');
        $this->assertInstanceOf($type, $denormalizedObject);
        $contact = $denormalizedObject->getContacts()->getContact();
        $this->assertInstanceOf($expectedInstance, reset($contact));
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
