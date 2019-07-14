<?php

namespace nickurt\HostFact\Tests\Endpoints;

class HostingTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_hosting_account()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","hosting":{"Identifier":"5","Username":"example2","Debtor":"1","DebtorCode":"DB0001","Domain":"example2.com","Server":"1","Package":"1","PackageName":"Hosting small","Comment":"","Status":"1","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P002","Description":"Hosting small","PriceExcl":"25","PriceIncl":"30.25","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2019-05-17","EndPeriod":"2019-06-17","NextDate":"2019-05-03","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2019-05-17","EndContract":"2019-06-17","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"25","AmountIncl":"30.25"},"PackageInfo":{"Identifier":"1","Name":"Hosting small","Type":"normal","Template":"yes","TemplateName":"","BandWidth":"","DiscSpace":"","Domains":"","SubDomains":"","Domainpointers":"","MySQLDatabases":"","EmailAccounts":""},"ServerInfo":{"Identifier":"1","Name":"Example server","Panel":"hostingclass","Location":"https://localhost","Port":"1234","IP":"","AdditionalIP":"","Settings":"","DefaultDNSTemplate":"1","SSOSupport":"url"},"Translations":{"Status":"Wachten op actie"}}}')
        );

        $hosting = $this->hostFact->hosting()->add([
            'DebtorCode' => 'DB0001',
            'Username' => 'example2',
            'Domain' => 'example2.com',
            'Package' => 1,
            'HasSubscription' => 'yes',
            'Subscription' => [
                'ProductCode' => 'P002'
            ]
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'hosting' => ['Identifier' => '5', 'Username' => 'example2', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Domain' => 'example2.com', 'Server' => '1', 'Package' => '1', 'PackageName' => 'Hosting small', 'Comment' => '', 'Status' => '1', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P002', 'Description' => 'Hosting small', 'PriceExcl' => '25', 'PriceIncl' => '30.25', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2019-05-17', 'EndPeriod' => '2019-06-17', 'NextDate' => '2019-05-03', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2019-05-17', 'EndContract' => '2019-06-17', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '25', 'AmountIncl' => '30.25'], 'PackageInfo' => ['Identifier' => '1', 'Name' => 'Hosting small', 'Type' => 'normal', 'Template' => 'yes', 'TemplateName' => '', 'BandWidth' => '', 'DiscSpace' => '', 'Domains' => '', 'SubDomains' => '', 'Domainpointers' => '', 'MySQLDatabases' => '', 'EmailAccounts' => ''], 'ServerInfo' => ['Identifier' => '1', 'Name' => 'Example server', 'Panel' => 'hostingclass', 'Location' => 'https://localhost', 'Port' => '1234', 'IP' => '', 'AdditionalIP' => '', 'Settings' => '', 'DefaultDNSTemplate' => '1', 'SSOSupport' => 'url'], 'Translations' => ['Status' => 'Wachten op actie']]], $hosting);
    }

    /** @test */
    public function it_can_create_a_new_hosting_account_on_server()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"create","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Hostingaccount example is succesvol aangemaakt","De e-mail met accountgegevens voor hostingaccount example is verzonden naar info@company.com"]}')
        );

        $hosting = $this->hostFact->hosting()->create([
            'Username' => 'example'
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'create', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Hostingaccount example is succesvol aangemaakt', 1 => 'De e-mail met accountgegevens voor hostingaccount example is verzonden naar info@company.com']], $hosting);
    }

    /** @test */
    public function it_can_delete_an_existing_hosting_account()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Het hostingaccount example is verwijderd uit HostFact"]}')
        );

        $hosting = $this->hostFact->hosting()->delete([
            'Username' => 'example'
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Het hostingaccount example is verwijderd uit HostFact']], $hosting);
    }

    /** @test */
    public function it_can_edit_an_existing_hosting_account()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","hosting":{"Identifier":"2","Username":"example","Debtor":"1","DebtorCode":"DB0001","Domain":"example.com","Server":"1","Package":"1","PackageName":"Hosting small","Comment":"","Status":"4","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P002","Description":"Hosting small","PriceExcl":"25","PriceIncl":"30.25","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"25","AmountIncl":"30.25"},"PackageInfo":{"Identifier":"1","Name":"Hosting small","Type":"normal","Template":"yes","TemplateName":"","BandWidth":"","DiscSpace":"","Domains":"","SubDomains":"","Domainpointers":"","MySQLDatabases":"","EmailAccounts":""},"ServerInfo":{"Identifier":"1","Name":"Example server","Panel":"hostingclass","Location":"https://localhost","Port":"1234","IP":"","AdditionalIP":"","Settings":"","DefaultDNSTemplate":"1","SSOSupport":"url"},"Translations":{"Status":"Actief"}}}')
        );

        $hosting = $this->hostFact->hosting()->edit([
            'Username' => 'example',
            'Status' => 4
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'hosting' => ['Identifier' => '2', 'Username' => 'example', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Domain' => 'example.com', 'Server' => '1', 'Package' => '1', 'PackageName' => 'Hosting small', 'Comment' => '', 'Status' => '4', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P002', 'Description' => 'Hosting small', 'PriceExcl' => '25', 'PriceIncl' => '30.25', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '25', 'AmountIncl' => '30.25'], 'PackageInfo' => ['Identifier' => '1', 'Name' => 'Hosting small', 'Type' => 'normal', 'Template' => 'yes', 'TemplateName' => '', 'BandWidth' => '', 'DiscSpace' => '', 'Domains' => '', 'SubDomains' => '', 'Domainpointers' => '', 'MySQLDatabases' => '', 'EmailAccounts' => ''], 'ServerInfo' => ['Identifier' => '1', 'Name' => 'Example server', 'Panel' => 'hostingclass', 'Location' => 'https://localhost', 'Port' => '1234', 'IP' => '', 'AdditionalIP' => '', 'Settings' => '', 'DefaultDNSTemplate' => '1', 'SSOSupport' => 'url'], 'Translations' => ['Status' => 'Actief']]], $hosting);
    }

    /** @test */
    public function it_can_get_domain_list_of_an_existing_hosting_account()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"getdomainlist","status":"success","date":"2019-05-20T12:00:00+02:00","currentresults":"1","hosting":{"domainlist":[{"Identifier":"1","Domain":"example.com","BandWidth":"onbekend","DiscSpace":"onbekend","Parent":"","Type":"","Active":""}]}}')
        );

        $hosting = $this->hostFact->hosting()->getDomainList([
            'Username' => 'example'
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'getdomainlist', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'currentresults' => '1', 'hosting' => ['domainlist' => [0 => ['Identifier' => '1', 'Domain' => 'example.com', 'BandWidth' => 'onbekend', 'DiscSpace' => 'onbekend', 'Parent' => '', 'Type' => '', 'Active' => '']]]], $hosting);
    }

    /** @test */
    public function it_can_list_all_the_hosting_accounts()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"4","currentresults":"4","offset":"0","filters":{"searchat":"DebtorCode","searchfor":"DB0001"},"hosting":[{"Identifier":"3","Username":"activeaccount","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Domain":"activedomain.com","Server":"1","Name":"Example server","Package":"1","PackageName":"Hosting small","Status":"4","Subscription":{"ProductCode":"P002","Description":"Hosting small","Number":"1","PriceExcl":"25","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","TerminationDate":"","AmountExcl":"25","AmountIncl":"30.25"},"Modified":"2019-05-20 12:00:00"},{"Identifier":"2","Username":"example","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Domain":"example.com","Server":"1","Name":"Example server","Package":"1","PackageName":"Hosting small","Status":"1","Subscription":{"ProductCode":"P002","Description":"Hosting small","Number":"1","PriceExcl":"25","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","TerminationDate":"","AmountExcl":"25","AmountIncl":"30.25"},"Modified":"2019-05-20 12:00:00"},{"Identifier":"1","Username":"examplesite","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Domain":"example-site.com","Server":"1","Name":"Example server","Package":"1","PackageName":"Hosting small","Status":"4","Subscription":{"ProductCode":"P001","Description":"Default product","Number":"1","PriceExcl":"250","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","TerminationDate":"","AmountExcl":"250","AmountIncl":"302.5"},"Modified":"2019-05-20 12:00:00"},{"Identifier":"4","Username":"suspendedaccount","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Domain":"suspendedaccount.com","Server":"1","Name":"Example server","Package":"1","PackageName":"Hosting small","Status":"5","Subscription":{"ProductCode":"P002","Description":"Hosting small","Number":"1","PriceExcl":"25","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","TerminationDate":"","AmountExcl":"25","AmountIncl":"30.25"},"Modified":"2019-05-20 12:00:00"}]}')
        );

        $hosting = $this->hostFact->hosting()->list([
            'searchat' => 'DebtorCode',
            'searchfor' => 'DB0001'
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '4', 'currentresults' => '4', 'offset' => '0', 'filters' => ['searchat' => 'DebtorCode', 'searchfor' => 'DB0001'], 'hosting' => [0 => ['Identifier' => '3', 'Username' => 'activeaccount', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Domain' => 'activedomain.com', 'Server' => '1', 'Name' => 'Example server', 'Package' => '1', 'PackageName' => 'Hosting small', 'Status' => '4', 'Subscription' => ['ProductCode' => 'P002', 'Description' => 'Hosting small', 'Number' => '1', 'PriceExcl' => '25', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'TerminationDate' => '', 'AmountExcl' => '25', 'AmountIncl' => '30.25'], 'Modified' => '2019-05-20 12:00:00'], 1 => ['Identifier' => '2', 'Username' => 'example', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Domain' => 'example.com', 'Server' => '1', 'Name' => 'Example server', 'Package' => '1', 'PackageName' => 'Hosting small', 'Status' => '1', 'Subscription' => ['ProductCode' => 'P002', 'Description' => 'Hosting small', 'Number' => '1', 'PriceExcl' => '25', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'TerminationDate' => '', 'AmountExcl' => '25', 'AmountIncl' => '30.25'], 'Modified' => '2019-05-20 12:00:00'], 2 => ['Identifier' => '1', 'Username' => 'examplesite', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Domain' => 'example-site.com', 'Server' => '1', 'Name' => 'Example server', 'Package' => '1', 'PackageName' => 'Hosting small', 'Status' => '4', 'Subscription' => ['ProductCode' => 'P001', 'Description' => 'Default product', 'Number' => '1', 'PriceExcl' => '250', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'TerminationDate' => '', 'AmountExcl' => '250', 'AmountIncl' => '302.5'], 'Modified' => '2019-05-20 12:00:00'], 3 => ['Identifier' => '4', 'Username' => 'suspendedaccount', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Domain' => 'suspendedaccount.com', 'Server' => '1', 'Name' => 'Example server', 'Package' => '1', 'PackageName' => 'Hosting small', 'Status' => '5', 'Subscription' => ['ProductCode' => 'P002', 'Description' => 'Hosting small', 'Number' => '1', 'PriceExcl' => '25', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'TerminationDate' => '', 'AmountExcl' => '25', 'AmountIncl' => '30.25'], 'Modified' => '2019-05-20 12:00:00']]], $hosting);
    }

    /** @test */
    public function it_can_remove_an_existing_hosting_account_on_server()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"removefromserver","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Hostingaccount examplesite is verwijderd van de server"]}')
        );

        $hosting = $this->hostFact->hosting()->removeFromServer([
            'Identifier' => '1',
            // 'Username' => 'id0001',
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'removefromserver', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Hostingaccount examplesite is verwijderd van de server']], $hosting);
    }

    /** @test */
    public function it_can_send_account_info_by_email()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"sendaccountinfobyemail","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De e-mail met accountgegevens voor hostingaccount example is verzonden naar info@company.com"]}')
        );

        $hosting = $this->hostFact->hosting()->sendAccountInfoByEmail([
            'Username' => 'example'
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'sendaccountinfobyemail', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De e-mail met accountgegevens voor hostingaccount example is verzonden naar info@company.com']], $hosting);
    }

    /** @test */
    public function it_can_show_an_existing_hosting_account()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","hosting":{"Identifier":"2","Username":"example","Debtor":"1","DebtorCode":"DB0001","Domain":"example.com","Server":"1","Package":"1","PackageName":"Hosting small","Comment":"","Status":"1","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P002","Description":"Hosting small","PriceExcl":"25","PriceIncl":"30.25","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"25","AmountIncl":"30.25"},"PackageInfo":{"Identifier":"1","Name":"Hosting small","Type":"normal","Template":"yes","TemplateName":"","BandWidth":"","DiscSpace":"","Domains":"","SubDomains":"","Domainpointers":"","MySQLDatabases":"","EmailAccounts":""},"ServerInfo":{"Identifier":"1","Name":"Example server","Panel":"hostingclass","Location":"https://localhost","Port":"1234","IP":"","AdditionalIP":"","Settings":"","DefaultDNSTemplate":"1","SSOSupport":"url"},"Translations":{"Status":"Wachten op actie"}}}')
        );

        $hosting = $this->hostFact->hosting()->show([
            'Username' => 'example'
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'hosting' => ['Identifier' => '2', 'Username' => 'example', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Domain' => 'example.com', 'Server' => '1', 'Package' => '1', 'PackageName' => 'Hosting small', 'Comment' => '', 'Status' => '1', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P002', 'Description' => 'Hosting small', 'PriceExcl' => '25', 'PriceIncl' => '30.25', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '25', 'AmountIncl' => '30.25'], 'PackageInfo' => ['Identifier' => '1', 'Name' => 'Hosting small', 'Type' => 'normal', 'Template' => 'yes', 'TemplateName' => '', 'BandWidth' => '', 'DiscSpace' => '', 'Domains' => '', 'SubDomains' => '', 'Domainpointers' => '', 'MySQLDatabases' => '', 'EmailAccounts' => ''], 'ServerInfo' => ['Identifier' => '1', 'Name' => 'Example server', 'Panel' => 'hostingclass', 'Location' => 'https://localhost', 'Port' => '1234', 'IP' => '', 'AdditionalIP' => '', 'Settings' => '', 'DefaultDNSTemplate' => '1', 'SSOSupport' => 'url'], 'Translations' => ['Status' => 'Wachten op actie']]], $hosting);
    }

    /** @test */
    public function it_can_suspend_an_existing_hosting_account()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"suspend","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Hostingaccount activeaccount is geblokkeerd"]}')
        );

        $hosting = $this->hostFact->hosting()->suspend([
            'Username' => 'activeaccount'
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'suspend', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Hostingaccount activeaccount is geblokkeerd']], $hosting);
    }

    /** @test */
    public function it_can_terminate_an_exsting_hosting_account()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"terminate","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Dienst is opgezegd met opzegdatum 14-07-2019"],"hosting":{"Identifier":"1","Username":"examplesite","Debtor":"1","DebtorCode":"DB0001","Domain":"example-site.com","Server":"1","Package":"1","PackageName":"Hosting small","Comment":"","Status":"4","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P001","Description":"Default product","PriceExcl":"250","PriceIncl":"302.5","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"2019-07-14","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"250","AmountIncl":"302.5"},"Termination":{"Date":"2019-07-14","Created":"2019-05-20 12:00:00","Status":"pending"},"PackageInfo":{"Identifier":"1","Name":"Hosting small","Type":"normal","Template":"yes","TemplateName":"","BandWidth":"","DiscSpace":"","Domains":"","SubDomains":"","Domainpointers":"","MySQLDatabases":"","EmailAccounts":""},"ServerInfo":{"Identifier":"1","Name":"Example server","Panel":"hostingclass","Location":"https://localhost","Port":"1234","IP":"","AdditionalIP":"","Settings":"","DefaultDNSTemplate":"1","SSOSupport":"url"},"Translations":{"Status":"Actief"}}}')
        );

        $hosting = $this->hostFact->hosting()->terminate([
            'Identifier' => '1',
            // 'Date' => '2015-01-01',
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'terminate', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Dienst is opgezegd met opzegdatum 14-07-2019'], 'hosting' => ['Identifier' => '1', 'Username' => 'examplesite', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Domain' => 'example-site.com', 'Server' => '1', 'Package' => '1', 'PackageName' => 'Hosting small', 'Comment' => '', 'Status' => '4', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P001', 'Description' => 'Default product', 'PriceExcl' => '250', 'PriceIncl' => '302.5', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '2019-07-14', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '250', 'AmountIncl' => '302.5'], 'Termination' => ['Date' => '2019-07-14', 'Created' => '2019-05-20 12:00:00', 'Status' => 'pending'], 'PackageInfo' => ['Identifier' => '1', 'Name' => 'Hosting small', 'Type' => 'normal', 'Template' => 'yes', 'TemplateName' => '', 'BandWidth' => '', 'DiscSpace' => '', 'Domains' => '', 'SubDomains' => '', 'Domainpointers' => '', 'MySQLDatabases' => '', 'EmailAccounts' => ''], 'ServerInfo' => ['Identifier' => '1', 'Name' => 'Example server', 'Panel' => 'hostingclass', 'Location' => 'https://localhost', 'Port' => '1234', 'IP' => '', 'AdditionalIP' => '', 'Settings' => '', 'DefaultDNSTemplate' => '1', 'SSOSupport' => 'url'], 'Translations' => ['Status' => 'Actief']]], $hosting);
    }

    /** @test */
    public function it_can_unsuspend_an_existing_hosting_account()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"unsuspend","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De blokkering van hostingaccount suspendedaccount is opgeheven, het hostingaccount is weer actief"]}')
        );

        $hosting = $this->hostFact->hosting()->unsuspend([
            'Username' => 'suspendedaccount'
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'unsuspend', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De blokkering van hostingaccount suspendedaccount is opgeheven, het hostingaccount is weer actief']], $hosting);
    }

    /** @test */
    public function it_can_up_or_downgrade_an_existing_hosting_account()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"hosting","action":"updowngrade","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Factuur [concept]0001 is bewerkt","Up-/downgrade van hostingaccount activeaccount is doorgevoerd in HostFact en op de server."],"hosting":{"Identifier":"3","Username":"activeaccount","Debtor":"1","DebtorCode":"DB0001","Domain":"activedomain.com","Server":"1","Package":"1","PackageName":"Hosting small","Comment":"","Status":"4","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P002","Description":"Hosting small","PriceExcl":"25","PriceIncl":"30.25","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2019-06-17","EndPeriod":"2019-07-17","NextDate":"2019-06-03","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2019-05-17","EndContract":"2019-06-17","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"25","AmountIncl":"30.25"},"PackageInfo":{"Identifier":"1","Name":"Hosting small","Type":"normal","Template":"yes","TemplateName":"","BandWidth":"","DiscSpace":"","Domains":"","SubDomains":"","Domainpointers":"","MySQLDatabases":"","EmailAccounts":""},"ServerInfo":{"Identifier":"1","Name":"Example server","Panel":"hostingclass","Location":"https://localhost","Port":"1234","IP":"","AdditionalIP":"","Settings":"","DefaultDNSTemplate":"1","SSOSupport":"url"},"Translations":{"Status":"Actief"}}}')
        );

        $hosting = $this->hostFact->hosting()->upDownGrade([
            'Username' => 'activeaccount',
            'ProductCode' => 'P002',
            'Periods' => 1,
            'Periodic' => 'm',
            'InvoiceCycle' => 'new_period',
            'CreateInvoice' => 'yes'
        ]);

        $this->assertSame(['controller' => 'hosting', 'action' => 'updowngrade', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Factuur [concept]0001 is bewerkt', 1 => 'Up-/downgrade van hostingaccount activeaccount is doorgevoerd in HostFact en op de server.'], 'hosting' => ['Identifier' => '3', 'Username' => 'activeaccount', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Domain' => 'activedomain.com', 'Server' => '1', 'Package' => '1', 'PackageName' => 'Hosting small', 'Comment' => '', 'Status' => '4', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P002', 'Description' => 'Hosting small', 'PriceExcl' => '25', 'PriceIncl' => '30.25', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2019-06-17', 'EndPeriod' => '2019-07-17', 'NextDate' => '2019-06-03', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2019-05-17', 'EndContract' => '2019-06-17', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '25', 'AmountIncl' => '30.25'], 'PackageInfo' => ['Identifier' => '1', 'Name' => 'Hosting small', 'Type' => 'normal', 'Template' => 'yes', 'TemplateName' => '', 'BandWidth' => '', 'DiscSpace' => '', 'Domains' => '', 'SubDomains' => '', 'Domainpointers' => '', 'MySQLDatabases' => '', 'EmailAccounts' => ''], 'ServerInfo' => ['Identifier' => '1', 'Name' => 'Example server', 'Panel' => 'hostingclass', 'Location' => 'https://localhost', 'Port' => '1234', 'IP' => '', 'AdditionalIP' => '', 'Settings' => '', 'DefaultDNSTemplate' => '1', 'SSOSupport' => 'url'], 'Translations' => ['Status' => 'Actief']]], $hosting);
    }
}
