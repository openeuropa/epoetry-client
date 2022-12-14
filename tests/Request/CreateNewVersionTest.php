<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\CreateNewVersion;
use OpenEuropa\EPoetry\Request\Type\DocumentIn;
use OpenEuropa\EPoetry\Request\Type\DossierReference;
use OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionIn;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use OpenEuropa\EPoetry\Request\Type\ProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\ReferenceDocuments;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use OpenEuropa\EPoetry\Request\Type\RequestReferenceIn;
use OpenEuropa\EPoetry\Request\Type\SrcDocumentIn;

/**
 * Test CreateNewVersion service.
 */
final class CreateNewVersionTest extends BaseRequestTest
{
    /**
     * Ensure the correct creation of an XML payload.
     */
    public function testXmlPayload(): void
    {
        $request = $this->getCreateNewVersion();

        $expected = file_get_contents(__DIR__ . '/fixtures/createNewVersion.xml');
        $request = $this->driver->encode('createNewVersion', [$request]);
        $this->assertXmlStringEqualsXmlString($expected, $request->getRequest());
    }

    /**
     * Test validation of CreateNewVersion class.
     *
     * @dataProvider dataProviderCreateNewVersion
     */
    public function testValidation($data, $expectations): void
    {
        $request = $this->serializer->fromArray($data, 'OpenEuropa\EPoetry\Request\Type\CreateNewVersion');
        $violations = $this->validator->validate($request);
        $values = [
            'violations' => $violations,
        ];
        $this->assertExpressionLanguageExpressions($expectations['assertions'], $values);
    }

    /**
     * Data provider.
     *
     * The actual data is read from fixtures stored in a YAML configuration.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderCreateNewVersion(): array
    {
        return $this->getFixture('createNewVersion.yaml', '/Request')['tests'];
    }

    /**
     * Gets test CreateNewVersion object.
     */
    protected function getCreateNewVersion(): CreateNewVersion
    {
        $dossier = (new DossierReference())
            ->setRequesterCode('DGT')
            ->setNumber(269)
            ->setYear(2021);

        $requestReference = (new RequestReferenceIn())
            ->setDossier($dossier)
            ->setProductType('TRA')
            ->setPart(0);

        $contacts = (new Contacts())
            ->addContact(new ContactPersonIn('micemil', 'REQUESTER'))
            ->addContact(new ContactPersonIn('micemil', 'AUTHOR'))
            ->addContact(new ContactPersonIn('micemil', 'RECIPIENT'));

        $linguisticSections = (new LinguisticSections())
            ->addLinguisticSection(new LinguisticSectionIn('EN'));
        $originalDocument = (new OriginalDocumentIn())
            ->setFileName('Emilia.docx')
            ->setComment('my comment')
            ->setContent('cid:123')
            ->setLinguisticSections($linguisticSections)
            ->setTrackChanges(false);

        $productRequest = (new ProductRequestIn())
            ->setLanguage('DE');
        $products = (new Products())
            ->addProduct($productRequest);

        $document = (new DocumentIn())
            ->setFileName('emilia.docx')
            ->setLanguage('DE')
            ->setComment('my comment')
            ->setContent('cid:1436708349321');

        $referenceDocuments = (new ReferenceDocuments())
            ->addDocument($document);

        $srcDocument = (new SrcDocumentIn())
            ->setFileName('emilia.docx')
            ->setComment('?')
            ->setContent('cid:1327394295671');

        $auxiliaryDocuments = (new AuxiliaryDocumentsIn())
            ->setReferenceDocuments($referenceDocuments)
            ->setSrcDocument($srcDocument);

        $requestDetails = new RequestDetailsIn();
        $requestDetails->setTitle('NewVersionEmilia')
            ->setInternalReference('')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2021-07-01T11:51:00+01:00'))
            ->setSensitive(false)
            ->setSentViaRue(false)
            ->setDocumentToAdopt(false)
            ->setDecideReference('')
            ->setDestination('PUBLIC')
            ->setProcedure('DEGHP')
            ->setSlaAnnex('ANNEX8A')
            ->setSlaCommitment('slaCom')
            ->setComment('comment')
            ->setOnBehalfOf('')
            ->setAccessibleTo('CONTACTS')
            ->setKeyword1('111')
            ->setKeyword2('333')
            ->setKeyword3('222')
            ->setContacts($contacts)
            ->setOriginalDocument($originalDocument)
            ->setProducts($products)
            ->setAuxiliaryDocuments($auxiliaryDocuments);

        $linguisticRequest = (new LinguisticRequestIn())
            ->setRequestReference($requestReference)
            ->setRequestDetails($requestDetails);

        return (new CreateNewVersion())
            ->setLinguisticRequest($linguisticRequest)
            ->setApplicationName('application1');
    }
}
