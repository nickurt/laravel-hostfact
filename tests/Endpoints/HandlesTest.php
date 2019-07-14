<?php

namespace nickurt\HostFact\Tests\Endpoints;

class HandlesTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_handle()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"handle","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Contact \'DB0001-002\' is aangemaakt"],"handle":{"Identifier":"2","Handle":"DB0001-002","Registrar":"0","RegistrarHandle":"","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","CompanyNumber":"123456789","LegalForm":"ANDERS","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PhoneNumber":"010 - 22 33 44","FaxNumber":"","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"LegalForm":"Anders of onbekend","Country":"Nederland","RegistrarName":""}}}')
        );

        $handle = $this->hostFact->handles()->add([
            'DebtorCode' => 'DB0001',
            'copyDataFromDebtor' => 'yes'
        ]);

        $this->assertSame(['controller' => 'handle', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Contact \'DB0001-002\' is aangemaakt'], 'handle' => ['Identifier' => '2', 'Handle' => 'DB0001-002', 'Registrar' => '0', 'RegistrarHandle' => '', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'CompanyNumber' => '123456789', 'LegalForm' => 'ANDERS', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PhoneNumber' => '010 - 22 33 44', 'FaxNumber' => '', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['LegalForm' => 'Anders of onbekend', 'Country' => 'Nederland', 'RegistrarName' => '']]], $handle);
    }

    /** @test */
    public function it_can_delete_an_existing_handle()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"handle","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Contact is verwijderd"]}')
        );

        $handle = $this->hostFact->handles()->delete([
            'Handle' => 'DB0001-001'
        ]);

        $this->assertSame(['controller' => 'handle', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Contact is verwijderd']], $handle);
    }

    /** @test */
    public function it_can_edit_an_existing_handle()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"handle","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","handle":{"Identifier":"1","Handle":"DB0001-001","Registrar":"1","RegistrarHandle":"","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","CompanyNumber":"123456789","LegalForm":"ANDERS","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PhoneNumber":"+3110223344","FaxNumber":"","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"LegalForm":"Anders of onbekend","Country":"Nederland","RegistrarName":"Example registrar"}}}')
        );

        $handle = $this->hostFact->handles()->edit([
            'Handle' => 'DB0001-001',
            'Registrar' => 1,
            'PhoneNumber' => '+3110223344'
        ]);

        $this->assertSame(['controller' => 'handle', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'handle' => ['Identifier' => '1', 'Handle' => 'DB0001-001', 'Registrar' => '1', 'RegistrarHandle' => '', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'CompanyNumber' => '123456789', 'LegalForm' => 'ANDERS', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PhoneNumber' => '+3110223344', 'FaxNumber' => '', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['LegalForm' => 'Anders of onbekend', 'Country' => 'Nederland', 'RegistrarName' => 'Example registrar']]], $handle);
    }

    /** @test */
    public function it_can_get_all_the_handles()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"handle","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"1","currentresults":"1","offset":"0","filters":{"searchfor":"DB0001"},"handles":[{"Identifier":"1","Handle":"DB0001-001","Registrar":"1","RegistrarHandle":"","Debtor":"1","CompanyName":"Company X","Initials":"John","SurName":"Jackson","EmailAddress":"info@company.com","Modified":"2019-05-20 12:00:00"}]}')
        );

        $handles = $this->hostFact->handles()->list([
            'searchfor' => 'DB0001'
        ]);

        $this->assertSame(['controller' => 'handle', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '1', 'currentresults' => '1', 'offset' => '0', 'filters' => ['searchfor' => 'DB0001'], 'handles' => [0 => ['Identifier' => '1', 'Handle' => 'DB0001-001', 'Registrar' => '1', 'RegistrarHandle' => '', 'Debtor' => '1', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'EmailAddress' => 'info@company.com', 'Modified' => '2019-05-20 12:00:00']]], $handles);
    }

    /** @test */
    public function it_can_get_an_existing_handle()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"handle","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","handle":{"Identifier":"1","Handle":"DB0001-001","Registrar":"1","RegistrarHandle":"","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","CompanyNumber":"123456789","LegalForm":"ANDERS","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PhoneNumber":"010 - 22 33 44","FaxNumber":"","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"LegalForm":"Anders of onbekend","Country":"Nederland","RegistrarName":"Example registrar"}}}')
        );

        $handle = $this->hostFact->handles()->show([
            'Handle' => 'DB0001-001'
        ]);

        $this->assertSame(['controller' => 'handle', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'handle' => ['Identifier' => '1', 'Handle' => 'DB0001-001', 'Registrar' => '1', 'RegistrarHandle' => '', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'CompanyNumber' => '123456789', 'LegalForm' => 'ANDERS', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PhoneNumber' => '010 - 22 33 44', 'FaxNumber' => '', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['LegalForm' => 'Anders of onbekend', 'Country' => 'Nederland', 'RegistrarName' => 'Example registrar']]], $handle);
    }

    /** @test */
    public function it_can_list_all_the_domains_of_an_existing_handle()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"handle","action":"listdomain","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"2","currentresults":"2","offset":"0","handles":[{"Identifier":"2","Domain":"dnsexample","Tld":"com","Debtor":"1","RegistrationDate":"","ExpirationDate":"2018-07-31","TerminationDate":"","Registrar":"1","Status":"4"},{"Identifier":"1","Domain":"example","Tld":"com","Debtor":"1","RegistrationDate":"","ExpirationDate":"2018-07-13","TerminationDate":"","Registrar":"1","Status":"1"}]}')
        );

        $handle = $this->hostFact->handles()->listDomain([
            'Handle' => 'DB0001-001'
        ]);

        $this->assertSame(['controller' => 'handle', 'action' => 'listdomain', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '2', 'currentresults' => '2', 'offset' => '0', 'handles' => [0 => ['Identifier' => '2', 'Domain' => 'dnsexample', 'Tld' => 'com', 'Debtor' => '1', 'RegistrationDate' => '', 'ExpirationDate' => '2018-07-31', 'TerminationDate' => '', 'Registrar' => '1', 'Status' => '4'], 1 => ['Identifier' => '1', 'Domain' => 'example', 'Tld' => 'com', 'Debtor' => '1', 'RegistrationDate' => '', 'ExpirationDate' => '2018-07-13', 'TerminationDate' => '', 'Registrar' => '1', 'Status' => '1']]], $handle);
    }
}
