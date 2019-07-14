<?php

namespace nickurt\HostFact\Tests\Endpoints;

class CreditorsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_creditor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditor","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","creditor":{"Identifier":"3","CreditorCode":"CD0003","MyCustomerCode":"","CompanyName":"Supplier 1","CompanyNumber":"","TaxNumber":"","Sex":"m","Initials":"Curtis","SurName":"Johnson","Address":"Adalbertstrasse 1","ZipCode":"10999","City":"Berlin","Country":"DE","EmailAddress":"billing@supplier.de","PhoneNumber":"","MobileNumber":"","FaxNumber":"","Comment":"","Authorisation":"no","AccountNumber":"","AccountBIC":"","AccountName":"","AccountBank":"","AccountCity":"","Term":"0","Groups":[],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Country":"Duitsland"}}}')
        );

        $creditor = $this->hostFact->creditors()->add([
            'CompanyName' => 'Supplier 1',
            'Initials' => 'Curtis',
            'SurName' => 'Johnson',
            'Sex' => 'm',
            'Address' => 'Adalbertstrasse 1',
            'ZipCode' => '10999',
            'City' => 'Berlin',
            'Country' => 'DE',
            'EmailAddress' => 'billing@supplier.de'
        ]);

        $this->assertSame(['controller' => 'creditor', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'creditor' => ['Identifier' => '3', 'CreditorCode' => 'CD0003', 'MyCustomerCode' => '', 'CompanyName' => 'Supplier 1', 'CompanyNumber' => '', 'TaxNumber' => '', 'Sex' => 'm', 'Initials' => 'Curtis', 'SurName' => 'Johnson', 'Address' => 'Adalbertstrasse 1', 'ZipCode' => '10999', 'City' => 'Berlin', 'Country' => 'DE', 'EmailAddress' => 'billing@supplier.de', 'PhoneNumber' => '', 'MobileNumber' => '', 'FaxNumber' => '', 'Comment' => '', 'Authorisation' => 'no', 'AccountNumber' => '', 'AccountBIC' => '', 'AccountName' => '', 'AccountBank' => '', 'AccountCity' => '', 'Term' => '0', 'Groups' => [], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Country' => 'Duitsland']]], $creditor);
    }

    /** @test */
    public function it_can_add_an_attachement_to_an_existing_creditor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de crediteur"]}')
        );

        $creditor = $this->hostFact->creditors()->attachments()->add([
            'CreditorCode' => 'CD0001',
            'Type' => 'creditor',
            'Filename' => 'sample.pdf',
            'Base64' => 'JVBERi0xLj...UlRU9GDQ=='
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de crediteur']], $creditor);
    }

    /** @test */
    public function it_can_delete_an_attachement_of_an_existing_creditor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De bijlage \'sample.pdf\' is verwijderd"]}')
        );

        $creditor = $this->hostFact->creditors()->attachments()->delete([
            'CreditorCode' => 'CD0001',
            'Type' => 'creditor',
            'Filename' => 'sample.pdf'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De bijlage \'sample.pdf\' is verwijderd']], $creditor);
    }


    /** @test */
    public function it_can_delete_an_existing_creditor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditor","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Crediteur CD0002 is succesvol verwijderd"]}')
        );

        $creditor = $this->hostFact->creditors()->delete([
            'Identifier' => '2',
        ]);

        $this->assertSame(['controller' => 'creditor', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Crediteur CD0002 is succesvol verwijderd']], $creditor);
    }

    /** @test */
    public function it_can_download_an_attachement_of_an_existing_creditor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"download","status":"success","date":"2019-05-20T12:00:00+02:00","success":["sample.pdf","JVBERi0xLj...olJUVPRg=="]}')
        );

        $creditor = $this->hostFact->creditors()->attachments()->download([
            'CreditorCode' => 'CD0001',
            'Type' => 'creditor',
            'Filename' => 'sample.pdf'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'download', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'sample.pdf', 1 => 'JVBERi0xLj...olJUVPRg==']], $creditor);
    }

    /** @test */
    public function it_can_edit_an_existing_creditor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditor","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","creditor":{"Identifier":"1","CreditorCode":"CD0001","MyCustomerCode":"","CompanyName":"Supplier 1","CompanyNumber":"","TaxNumber":"","Sex":"m","Initials":"Gunther","SurName":"Meusmann","Address":"Adalbertstrasse 1","ZipCode":"10999","City":"Berlin","Country":"DE","EmailAddress":"billing@supplier.de","PhoneNumber":"","MobileNumber":"","FaxNumber":"","Comment":"","Authorisation":"no","AccountNumber":"","AccountBIC":"","AccountName":"","AccountBank":"","AccountCity":"","Term":"0","Groups":[],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Country":"Duitsland"}}}')
        );

        $creditor = $this->hostFact->creditors()->edit([
            'Identifier' => '1',
            'Initials' => 'Gunther',
            'SurName' => 'Meusmann'
        ]);

        $this->assertSame(['controller' => 'creditor', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'creditor' => ['Identifier' => '1', 'CreditorCode' => 'CD0001', 'MyCustomerCode' => '', 'CompanyName' => 'Supplier 1', 'CompanyNumber' => '', 'TaxNumber' => '', 'Sex' => 'm', 'Initials' => 'Gunther', 'SurName' => 'Meusmann', 'Address' => 'Adalbertstrasse 1', 'ZipCode' => '10999', 'City' => 'Berlin', 'Country' => 'DE', 'EmailAddress' => 'billing@supplier.de', 'PhoneNumber' => '', 'MobileNumber' => '', 'FaxNumber' => '', 'Comment' => '', 'Authorisation' => 'no', 'AccountNumber' => '', 'AccountBIC' => '', 'AccountName' => '', 'AccountBank' => '', 'AccountCity' => '', 'Term' => '0', 'Groups' => [], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Country' => 'Duitsland']]], $creditor);
    }

    /** @test */
    public function it_can_get_all_the_creditors()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditor","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"0","currentresults":"0","offset":"0","filters":{"searchfor":"Meusmann"}}')
        );

        $creditors = $this->hostFact->creditors()->list([
            'searchfor' => 'Meusmann'
        ]);

        $this->assertSame(['controller' => 'creditor', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '0', 'currentresults' => '0', 'offset' => '0', 'filters' => ['searchfor' => 'Meusmann']], $creditors);

    }

    /** @test */
    public function it_can_show_the_creditor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditor","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","creditor":{"Identifier":"1","CreditorCode":"CD0001","MyCustomerCode":"","CompanyName":"Supplier 1","CompanyNumber":"","TaxNumber":"","Sex":"m","Initials":"Curtis","SurName":"Johnson","Address":"Adalbertstrasse 1","ZipCode":"10999","City":"Berlin","Country":"DE","EmailAddress":"billing@supplier.de","PhoneNumber":"","MobileNumber":"","FaxNumber":"","Comment":"","Authorisation":"no","AccountNumber":"","AccountBIC":"","AccountName":"","AccountBank":"","AccountCity":"","Term":"0","Groups":[],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Country":"Duitsland"}}}')
        );

        $creditor = $this->hostFact->creditors()->show([
            'CreditorCode' => 'CD0001'
        ]);

        $this->assertSame(['controller' => 'creditor', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'creditor' => ['Identifier' => '1', 'CreditorCode' => 'CD0001', 'MyCustomerCode' => '', 'CompanyName' => 'Supplier 1', 'CompanyNumber' => '', 'TaxNumber' => '', 'Sex' => 'm', 'Initials' => 'Curtis', 'SurName' => 'Johnson', 'Address' => 'Adalbertstrasse 1', 'ZipCode' => '10999', 'City' => 'Berlin', 'Country' => 'DE', 'EmailAddress' => 'billing@supplier.de', 'PhoneNumber' => '', 'MobileNumber' => '', 'FaxNumber' => '', 'Comment' => '', 'Authorisation' => 'no', 'AccountNumber' => '', 'AccountBIC' => '', 'AccountName' => '', 'AccountBank' => '', 'AccountCity' => '', 'Term' => '0', 'Groups' => [], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Country' => 'Duitsland']]], $creditor);
    }
}