<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\Contacts;
use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut;
use OpenEuropa\EPoetry\Request\Type\LinguisticSections;
use OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn;
use OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn;
use OpenEuropa\EPoetry\Request\Type\Products;
use OpenEuropa\EPoetry\Request\Type\RequestDetailsIn;
use Phpro\SoapClient\Caller\EngineCaller;
use PHPUnit\Framework\TestCase;
use Soap\Engine\SimpleEngine;
use Soap\ExtSoapEngine\AbusedClient;
use Soap\ExtSoapEngine\ExtSoapDriver;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\ExtSoapEngine\Transport\TraceableTransport;
use Soap\Psr18Transport\Psr18Transport;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * @internal
 * @coversNothing
 */
final class RequestTest extends TestCase
{
    /**
     * Test a SOAP request.
     */
    public function testRequestSending(): void
    {
        $responseBody = <<<BODY
<S:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
   <env:Header/>
   <S:Body>
      <ns0:createLinguisticRequestResponse xmlns:ns0="http://eu.europa.ec.dgt.epoetry"></ns0:createLinguisticRequestResponse>
   </S:Body>
</S:Envelope>
BODY;

        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], $responseBody),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $guzzle = GuzzleAdapter::createWithConfig(['handler' => $handlerStack]);

        $wsdl = __DIR__.'/../../resources/request.wsdl';
        $engine = new SimpleEngine(
            ExtSoapDriver::createFromClient(
                $client = AbusedClient::createFromOptions(
                    ExtSoapOptions::defaults($wsdl)
                        ->withClassMap(RequestClassmap::getCollection())
                        ->withWsdlProvider(new LocalWsdlProvider())
                        ->disableWsdlCache()
                )
            ),
            $transport = new TraceableTransport(
                $client,
                Psr18Transport::createForClient($guzzle)
            )
        );

        $requestClient = new RequestClient(new EngineCaller($engine));

        $requestDetails = new RequestDetailsIn();
        $requestDetails->setTitle('test for DOC - success')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2022-07-01T11:51:00+01:00'))
            ->setSensitive(false)
            ->setDestination('PUBLIC')
            ->setProcedure('DEGHP')
            ->setSlaAnnex('ANNEX8A')
            ->setSlaCommitment('2225555')
            ->setComment('comment')
            ->setAccessibleTo('CONTACTS')
            ->setKeyword1('keyw1')
            ->setKeyword2('key2')
            ->setKeyword3('aaaaaaaaaaaaaaa');
        $contacts = (new Contacts())
            ->addContact(new ContactPersonIn('liekejo', 'REQUESTER'))
            ->addContact(new ContactPersonIn('liekejo', 'AUTHOR'))
            ->addContact(new ContactPersonIn('liekejo', 'RECIPIENT'));
        $requestDetails->setContacts($contacts);

        $linguisticSections = (new LinguisticSections())
            ->addLinguisticSection(new LinguisticSectionOut('FR'));
        $originalDocument = (new OriginalDocumentIn())
            ->setTrackChanges(FALSE)
            ->setFileName('TEST_FILE_ORIGINALP.docx')
            ->setContent('cid:267736828531')
            ->setLinguisticSections($linguisticSections)
            ->setComment('');
        $requestDetails->setOriginalDocument($originalDocument);

        $modifyProductRequestIn = (new ModifyProductRequestIn())
            ->setLanguage('FR')
            ->setRequestedDeadline(\DateTime::createFromFormat(DATE_RFC3339, '2021-07-06T11:51:00+01:00'))
            ->setTrackChanges(false);
        $products = (new Products())
            ->addProduct($modifyProductRequestIn);
        $requestDetails->setProducts($products);

        $request = (new CreateLinguisticRequest())
            ->setRequestDetails($requestDetails)
            ->setApplicationName('appname')
            ->setTemplateName('templatename');

        $requestClient->createLinguisticRequest($request);

        $r = $transport->collectLastRequestInfo()->getLastRequest();
        $expected = <<<EXPECTED
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://eu.europa.ec.dgt.epoetry" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <SOAP-ENV:Body>
      <ns1:createLinguisticRequest>
         <requestDetails>
            <title>test for DOC - success</title>
            <requestedDeadline>2022-07-01T11:51:00+01:00</requestedDeadline>
            <sensitive>false</sensitive>
            <destination>PUBLIC</destination>
            <procedure>DEGHP</procedure>
            <slaAnnex>ANNEX8A</slaAnnex>
            <slaCommitment>2225555</slaCommitment>
            <comment>comment</comment>
            <accessibleTo>CONTACTS</accessibleTo>
            <keyword1>keyw1</keyword1>
            <keyword2>key2</keyword2>
            <keyword3>aaaaaaaaaaaaaaa</keyword3>
            <contacts>
               <contact userId="liekejo" contactRole="REQUESTER" />
               <contact userId="liekejo" contactRole="AUTHOR" />
               <contact userId="liekejo" contactRole="RECIPIENT" />
            </contacts>
            <originalDocument>
               <fileName>TEST_FILE_ORIGINALP.docx</fileName>
               <comment />
               <content>Y2lkOjI2NzczNjgyODUzMQ==</content>
               <linguisticSections>
                  <linguisticSection xsi:type="ns1:linguisticSectionOut">
                     <language>FR</language>
                  </linguisticSection>
               </linguisticSections>
               <trackChanges>false</trackChanges>
            </originalDocument>
            <products>
               <product requestedDeadline="2021-07-06T11:51:00+01:00" trackChanges="false" xsi:type="ns1:modifyProductRequestIn">
                  <language>FR</language>
               </product>
            </products>
         </requestDetails>
         <applicationName>appname</applicationName>
         <templateName>templatename</templateName>
      </ns1:createLinguisticRequest>
   </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
EXPECTED;

        $this->assertXmlStringEqualsXmlString($expected, $transport->collectLastRequestInfo()->getLastRequest());
    }
}
