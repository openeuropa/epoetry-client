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
        // XML single value.
        $xml = '<?xml version="1.0"?><response><products><product><language>FR</language><requestedDeadline>2021-07-06T11:51:00+01:00</requestedDeadline><trackChanges>0</trackChanges><status>SenttoDGT</status><format>DOCX</format></product></products></response>';
        $this->assertProducts($xml, RequestDetailsOut::class, ProductRequestOut::class, 'xml', 1, ['FR']);
        $this->assertProducts($xml, RequestDetailsIn::class, ProductRequestIn::class, 'xml', 1, ['FR']);
        $this->assertProducts($xml, ModifyRequestDetailsIn::class, ModifyProductRequestIn::class, 'xml', 1, ['FR']);

        // XML multiple values.
        $xml = '<?xml version="1.0"?><response><products><product><language>FR</language><requestedDeadline>2021-07-06T11:51:00+01:00</requestedDeadline><trackChanges>0</trackChanges><status>SenttoDGT</status><format>DOCX</format></product><product><language>EN</language><requestedDeadline>2021-07-06T11:51:00+01:00</requestedDeadline><trackChanges>0</trackChanges><status>SenttoDGT</status><format>DOCX</format></product></products></response>';
        $this->assertProducts($xml, RequestDetailsOut::class, ProductRequestOut::class, 'xml', 2, ['FR', 'EN']);
        $this->assertProducts($xml, RequestDetailsIn::class, ProductRequestIn::class, 'xml', 2, ['FR', 'EN']);
        $this->assertProducts($xml, ModifyRequestDetailsIn::class, ModifyProductRequestIn::class, 'xml', 2, ['FR', 'EN']);

        // XML multiple values with attributes.
        $xml = '<?xml version="1.0"?><response><products><product requestedDeadline="2021-07-06T11:51:00+01:00" trackChanges="true"><language>FR</language></product><product requestedDeadline="2022-07-06T11:51:00+01:00" trackChanges="false"><language>EN</language></product></products></response>';
        $this->assertProducts($xml, RequestDetailsIn::class, ProductRequestIn::class, 'xml', 2, ['FR', 'EN']);

        // Yaml strings.
        $yaml = "{ products: { product: [{ language: FR, acceptedDeadline: '2022-07-01T11:51:00+01:00', trackChanges: true, status: Ongoing, format: DOC }, { language: EN, requestedDeadline: '2022-08-01T11:51:00+01:00', trackChanges: false, status: Accepted, format: DOCX }] } }";
        $this->assertProducts($yaml, RequestDetailsOut::class, ProductRequestOut::class, 'yaml', 2, ['FR', 'EN']);
        $this->assertProducts($yaml, RequestDetailsIn::class, ProductRequestIn::class, 'yaml', 2, ['FR', 'EN']);
        $this->assertProducts($yaml, ModifyRequestDetailsIn::class, ModifyProductRequestIn::class, 'yaml', 2, ['FR', 'EN']);
    }

    /**
     * Asserts denormalization of OpenEuropa\EPoetry\Request\Type\Products object.
     */
    protected function assertProducts(string $yaml, string $type, string $expectedInstance, string $format, int $count, array $expectedLanguages): void
    {
        $denormalizedObject = $this->serializer->fromString($yaml, $type, $format);
        $this->assertInstanceOf($type, $denormalizedObject);
        $products = $denormalizedObject->getProducts()->getProduct();
        $this->assertCount($count, $products);
        foreach ($products as $product) {
            $this->assertInstanceOf($expectedInstance, $product);
        }
        foreach ($expectedLanguages as $key => $value) {
            $this->assertEquals($value, $products[$key]->getLanguage());
        }
    }

    /**
     * Tests LinguisticSectionsDenormalizer.
     */
    public function testLinguisticSectionsDenormalizer(): void
    {
        // XML single value.
        $xml = '<?xml version="1.0"?><response><linguisticSections><linguisticSection><language>FR</language></linguisticSection></linguisticSections></response>';
        $this->assertLinguisticSections($xml, OriginalDocumentOut::class, LinguisticSectionOut::class, 'xml', 1, ['FR']);
        $this->assertLinguisticSections($xml, OriginalDocumentIn::class, LinguisticSectionIn::class, 'xml', 1, ['FR']);

        // XML multiple values.
        $xml = '<?xml version="1.0"?><response><linguisticSections><linguisticSection><language>FR</language><language>EN</language></linguisticSection></linguisticSections></response>';
        $this->assertLinguisticSections($xml, OriginalDocumentOut::class, LinguisticSectionOut::class, 'xml', 2, ['FR', 'EN']);
        $this->assertLinguisticSections($xml, OriginalDocumentIn::class, LinguisticSectionIn::class, 'xml', 2, ['FR', 'EN']);

        // Yaml strings.
        $yaml = "{ linguisticSections: { linguisticSection: [{ language: FR }] } }";
        $this->assertLinguisticSections($yaml, OriginalDocumentOut::class, LinguisticSectionOut::class, 'yaml', 1, ['FR']);
        $this->assertLinguisticSections($yaml, OriginalDocumentIn::class, LinguisticSectionIn::class, 'yaml', 1, ['FR']);
    }

    /**
     * Asserts denormalization of OpenEuropa\EPoetry\Request\Type\LinguisticSections object.
     */
    protected function assertLinguisticSections(string $yaml, string $type, string $expectedInstance, string $format, int $count, array $languages): void
    {
        $denormalizedObject = $this->serializer->fromString($yaml, $type, $format);
        $this->assertInstanceOf($type, $denormalizedObject);
        $linguisticSections = $denormalizedObject->getLinguisticSections()->getLinguisticSection();
        $this->assertCount($count, $linguisticSections);
        foreach ($linguisticSections as $linguisticSection) {
            $this->assertInstanceOf($expectedInstance, $linguisticSection);
        }
        foreach ($languages as $key => $value) {
            $this->assertEquals($value, $linguisticSections[$key]->getLanguage());
        }
    }

    /**
     * Tests ContactsDenormalizer.
     */
    public function testContactsDenormalizer(): void
    {
        // XML single value.
        $xml = '<?xml version="1.0"?><response><contacts><contact><firstName>First1</firstName><lastName>Last1</lastName><email>mail1@ec.europa.eu</email><userId>id1</userId><roleCode>AUTHOR</roleCode></contact></contacts></response>';
        $this->assertContacts($xml, RequestDetailsOut::class, ContactPersonOut::class, 'xml', 1, ['id1']);

        $xml = '<?xml version="1.0"?><response><contacts><contact><userId>id1</userId><contactRole>AUTHOR</contactRole></contact></contacts></response>';
        $this->assertContacts($xml, RequestDetailsIn::class, ContactPersonIn::class, 'xml', 1, ['id1']);
        $this->assertContacts($xml, ModifyRequestDetailsIn::class, ContactPersonIn::class, 'xml', 1, ['id1']);

        $xml = '<?xml version="1.0"?><response><contacts></contacts></response>';
        $this->assertContacts($xml, RequestDetailsIn::class, ContactPersonIn::class, 'xml', 0, []);
        $this->assertContacts($xml, ModifyRequestDetailsIn::class, ContactPersonIn::class, 'xml', 0, []);

        // XML multiple values.
        $xml = '<?xml version="1.0"?><response><contacts><contact><firstName>First1</firstName><lastName>Last1</lastName><email>mail1@ec.europa.eu</email><userId>id1</userId><roleCode>AUTHOR</roleCode></contact><contact><firstName>First2</firstName><lastName>Last2</lastName><email>mail2@ec.europa.eu</email><userId>id2</userId><roleCode>RECIPIENT</roleCode></contact></contacts></response>';
        $this->assertContacts($xml, RequestDetailsOut::class, ContactPersonOut::class, 'xml', 2, ['id1', 'id2']);
        $xml = '<?xml version="1.0"?><response><contacts><contact><userId>id1</userId><contactRole>AUTHOR</contactRole></contact><contact><userId>id2</userId><contactRole>RECIPIENT</contactRole></contact></contacts></response>';
        $this->assertContacts($xml, RequestDetailsIn::class, ContactPersonIn::class, 'xml', 2, ['id1', 'id2']);
        $this->assertContacts($xml, ModifyRequestDetailsIn::class, ContactPersonIn::class, 'xml', 2, ['id1', 'id2']);

        // XML multiple values with attributes.
        $xml = '<?xml version="1.0"?><response><contacts><contact userId="id1" contactRole="AUTHOR"></contact><contact userId="id2" contactRole="RECIPIENT"></contact></contacts></response>';
        $this->assertContacts($xml, RequestDetailsIn::class, ContactPersonIn::class, 'xml', 2, ['id1', 'id2']);
        $this->assertContacts($xml, ModifyRequestDetailsIn::class, ContactPersonIn::class, 'xml', 2, ['id1', 'id2']);

        // Yaml strings.
        $yaml = "{ contacts: { contact: [{ firstName: First1, lastName: Last1, email: mail1@ec.europa.eu, userId: id1, roleCode: AUTHOR }] } }";
        $this->assertContacts($yaml, RequestDetailsOut::class, ContactPersonOut::class, 'yaml', 1, ['id1']);

        $yaml = "{ contacts: { contact: [{ userId: id1, contactRole: role }] } }";
        $this->assertContacts($yaml, RequestDetailsIn::class, ContactPersonIn::class, 'yaml', 1, ['id1']);
        $this->assertContacts($yaml, ModifyRequestDetailsIn::class, ContactPersonIn::class, 'yaml', 1, ['id1']);

        $yaml = "{ contacts: {  } }";
        $this->assertContacts($yaml, RequestDetailsIn::class, ContactPersonIn::class, 'yaml', 0, []);
        $this->assertContacts($yaml, ModifyRequestDetailsIn::class, ContactPersonIn::class, 'yaml', 0, []);
    }

    /**
     * Asserts denormalization of OpenEuropa\EPoetry\Request\Type\Contacts object.
     */
    protected function assertContacts(string $yaml, string $type, string $expectedInstance, string $format, int $count, array $userIds): void
    {
        $denormalizedObject = $this->serializer->fromString($yaml, $type, $format);
        $this->assertInstanceOf($type, $denormalizedObject);
        $contacts = $denormalizedObject->getContacts()->getContact();
        $this->assertCount($count, $contacts);
        foreach ($contacts as $contact) {
            $this->assertInstanceOf($expectedInstance, $contact);
        }
        foreach ($userIds as $key => $value) {
            $this->assertEquals($value, $contacts[$key]->getUserId());
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
