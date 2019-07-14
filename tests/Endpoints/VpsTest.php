<?php

namespace nickurt\HostFact\Tests\Endpoints;

class VpsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Dienst is aangemaakt"],"vps":{"Identifier":"3","Hostname":"vps1.example.com","Debtor":"1","DebtorCode":"DB0001","IPAddress":"","Package":"1","Node":"1","ServerID":"","Image":"key1","MemoryMB":"500","DiskSpaceGB":"20","BandWidthGB":"20","CPUCores":"1","Comment":"","Status":"waiting","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P005","Description":"VPS package 1","PriceExcl":"35","PriceIncl":"42.35","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2019-05-17","EndPeriod":"2019-06-17","NextDate":"2019-05-03","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2019-05-17","EndContract":"2019-06-17","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"35","AmountIncl":"42.35"},"NodeInfo":{"Name":"Example VPS Node","Images":[{"Node":"1","Key":"img1","ImageName":"An example image","Status":"active"}],"Platform":"apiexample","Location":"a","Port":""},"Translations":{"PackageName":"VPS package 1","NodeName":"Example VPS Node","ImageName":""}}}')
        );

        $vps = $this->hostFact->vps()->add([
            'DebtorCode' => 'DB0001',
            'Hostname' => 'vps1.example.com',
            'Package' => 1,
            'HasSubscription' => 'yes',
            'Subscription' => [
                'ProductCode' => 'P005'
            ]
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Dienst is aangemaakt'], 'vps' => ['Identifier' => '3', 'Hostname' => 'vps1.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '', 'Package' => '1', 'Node' => '1', 'ServerID' => '', 'Image' => 'key1', 'MemoryMB' => '500', 'DiskSpaceGB' => '20', 'BandWidthGB' => '20', 'CPUCores' => '1', 'Comment' => '', 'Status' => 'waiting', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P005', 'Description' => 'VPS package 1', 'PriceExcl' => '35', 'PriceIncl' => '42.35', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2019-05-17', 'EndPeriod' => '2019-06-17', 'NextDate' => '2019-05-03', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2019-05-17', 'EndContract' => '2019-06-17', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '35', 'AmountIncl' => '42.35'], 'NodeInfo' => ['Name' => 'Example VPS Node', 'Images' => [0 => ['Node' => '1', 'Key' => 'img1', 'ImageName' => 'An example image', 'Status' => 'active']], 'Platform' => 'apiexample', 'Location' => 'a', 'Port' => ''], 'Translations' => ['PackageName' => 'VPS package 1', 'NodeName' => 'Example VPS Node', 'ImageName' => '']]], $vps);
    }

    /** @test */
    public function it_can_create_a_new_vps_on_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"create","status":"success","date":"2019-05-20T12:00:00+02:00","success":["VPS vps2.example.com is succesvol aangemaakt","De e-mail met accountgegevens voor de VPS vps2.example.com is verzonden naar info@company.com"],"vps":{"Identifier":"2","Hostname":"vps2.example.com","Debtor":"1","DebtorCode":"DB0001","IPAddress":"123.45.67.89","Package":"1","Node":"1","ServerID":"1234","Image":"img1","MemoryMB":"500","DiskSpaceGB":"20","BandWidthGB":"20","CPUCores":"1","Comment":"","Status":"active","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","NodeInfo":{"Name":"Example VPS Node","Images":[{"Node":"1","Key":"img1","ImageName":"An example image","Status":"active"}],"Platform":"apiexample","Location":"a","Port":""},"Translations":{"PackageName":"VPS package 1","NodeName":"Example VPS Node","ImageName":"An example image"}}}')
        );

        $vps = $this->hostFact->vps()->create([
            'Hostname' => 'vps2.example.com'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'create', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'VPS vps2.example.com is succesvol aangemaakt', 1 => 'De e-mail met accountgegevens voor de VPS vps2.example.com is verzonden naar info@company.com'], 'vps' => ['Identifier' => '2', 'Hostname' => 'vps2.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '123.45.67.89', 'Package' => '1', 'Node' => '1', 'ServerID' => '1234', 'Image' => 'img1', 'MemoryMB' => '500', 'DiskSpaceGB' => '20', 'BandWidthGB' => '20', 'CPUCores' => '1', 'Comment' => '', 'Status' => 'active', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'NodeInfo' => ['Name' => 'Example VPS Node', 'Images' => [0 => ['Node' => '1', 'Key' => 'img1', 'ImageName' => 'An example image', 'Status' => 'active']], 'Platform' => 'apiexample', 'Location' => 'a', 'Port' => ''], 'Translations' => ['PackageName' => 'VPS package 1', 'NodeName' => 'Example VPS Node', 'ImageName' => 'An example image']]], $vps);
    }

    /** @test */
    public function it_can_download_account_data_of_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"downloadaccountdata","status":"success","date":"2019-05-20T12:00:00+02:00","success":[],"vps":{"Filename":"Gegevens.VPS.pdf","Base64":"JVBERi0xLj...UlRU9GCg=="}}')
        );

        $vps = $this->hostFact->vps()->downloadAccountData([
            'Hostname' => 'vps1.example.com'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'downloadaccountdata', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [], 'vps' => ['Filename' => 'Gegevens.VPS.pdf', 'Base64' => 'JVBERi0xLj...UlRU9GCg==']], $vps);
    }

    /** @test */
    public function it_can_list_all_the_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"2","currentresults":"2","offset":"0","filters":{"searchat":"DebtorCode","searchfor":"DB0001"},"vps":[{"Identifier":"1","Hostname":"vps1.example.com","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","IPAddress":"123.45.67.89","ServerID":"1234","Package":"1","Node":"1","Image":"img1","Status":"active","Subscription":{"ProductCode":"P005","Description":"VPS package 1","Number":"1","PriceExcl":"35","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","TerminationDate":"","AmountExcl":"35","AmountIncl":"42.35"},"Modified":"2019-05-20 12:00:00"},{"Identifier":"2","Hostname":"vps2.example.com","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","IPAddress":"123.45.67.89","ServerID":"1234","Package":"1","Node":"1","Image":"img1","Status":"waiting","Modified":"2019-05-20 12:00:00"}]}')
        );

        $vps = $this->hostFact->vps()->list([
            'searchat' => 'DebtorCode',
            'searchfor' => 'DB0001'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '2', 'currentresults' => '2', 'offset' => '0', 'filters' => ['searchat' => 'DebtorCode', 'searchfor' => 'DB0001'], 'vps' => [0 => ['Identifier' => '1', 'Hostname' => 'vps1.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'IPAddress' => '123.45.67.89', 'ServerID' => '1234', 'Package' => '1', 'Node' => '1', 'Image' => 'img1', 'Status' => 'active', 'Subscription' => ['ProductCode' => 'P005', 'Description' => 'VPS package 1', 'Number' => '1', 'PriceExcl' => '35', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'TerminationDate' => '', 'AmountExcl' => '35', 'AmountIncl' => '42.35'], 'Modified' => '2019-05-20 12:00:00'], 1 => ['Identifier' => '2', 'Hostname' => 'vps2.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'IPAddress' => '123.45.67.89', 'ServerID' => '1234', 'Package' => '1', 'Node' => '1', 'Image' => 'img1', 'Status' => 'waiting', 'Modified' => '2019-05-20 12:00:00']]], $vps);
    }

    /** @test */
    public function it_can_pause_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"pause","status":"success","date":"2019-05-20T12:00:00+02:00","success":["VPS vps1.example.com is succesvol gepauzeerd"],"vps":{"Identifier":"1","Hostname":"vps1.example.com","Debtor":"1","DebtorCode":"DB0001","IPAddress":"123.45.67.89","Package":"1","Node":"1","ServerID":"1234","Image":"img1","MemoryMB":"500","DiskSpaceGB":"20","BandWidthGB":"20","CPUCores":"1","Comment":"","Status":"active","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P005","Description":"VPS package 1","PriceExcl":"35","PriceIncl":"42.35","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"35","AmountIncl":"42.35"},"NodeInfo":{"Name":"Example VPS Node","Images":[{"Node":"1","Key":"img1","ImageName":"An example image","Status":"active"}],"Platform":"apiexample","Location":"a","Port":""},"Translations":{"PackageName":"VPS package 1","NodeName":"Example VPS Node","ImageName":"An example image"}}}')
        );

        $vps = $this->hostFact->vps()->pause([
            'Hostname' => 'vps1.example.com'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'pause', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'VPS vps1.example.com is succesvol gepauzeerd'], 'vps' => ['Identifier' => '1', 'Hostname' => 'vps1.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '123.45.67.89', 'Package' => '1', 'Node' => '1', 'ServerID' => '1234', 'Image' => 'img1', 'MemoryMB' => '500', 'DiskSpaceGB' => '20', 'BandWidthGB' => '20', 'CPUCores' => '1', 'Comment' => '', 'Status' => 'active', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P005', 'Description' => 'VPS package 1', 'PriceExcl' => '35', 'PriceIncl' => '42.35', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '35', 'AmountIncl' => '42.35'], 'NodeInfo' => ['Name' => 'Example VPS Node', 'Images' => [0 => ['Node' => '1', 'Key' => 'img1', 'ImageName' => 'An example image', 'Status' => 'active']], 'Platform' => 'apiexample', 'Location' => 'a', 'Port' => ''], 'Translations' => ['PackageName' => 'VPS package 1', 'NodeName' => 'Example VPS Node', 'ImageName' => 'An example image']]], $vps);
    }

    /** @test */
    public function it_can_restart_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"restart","status":"success","date":"2019-05-20T12:00:00+02:00","success":["VPS vps1.example.com is succesvol herstart"],"vps":{"Identifier":"1","Hostname":"vps1.example.com","Debtor":"1","DebtorCode":"DB0001","IPAddress":"123.45.67.89","Package":"1","Node":"1","ServerID":"1234","Image":"img1","MemoryMB":"500","DiskSpaceGB":"20","BandWidthGB":"20","CPUCores":"1","Comment":"","Status":"active","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P005","Description":"VPS package 1","PriceExcl":"35","PriceIncl":"42.35","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"35","AmountIncl":"42.35"},"NodeInfo":{"Name":"Example VPS Node","Images":[{"Node":"1","Key":"img1","ImageName":"An example image","Status":"active"}],"Platform":"apiexample","Location":"a","Port":""},"Translations":{"PackageName":"VPS package 1","NodeName":"Example VPS Node","ImageName":"An example image"}}}')
        );

        $vps = $this->hostFact->vps()->restart([
            'Hostname' => 'vps1.example.com'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'restart', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'VPS vps1.example.com is succesvol herstart'], 'vps' => ['Identifier' => '1', 'Hostname' => 'vps1.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '123.45.67.89', 'Package' => '1', 'Node' => '1', 'ServerID' => '1234', 'Image' => 'img1', 'MemoryMB' => '500', 'DiskSpaceGB' => '20', 'BandWidthGB' => '20', 'CPUCores' => '1', 'Comment' => '', 'Status' => 'active', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P005', 'Description' => 'VPS package 1', 'PriceExcl' => '35', 'PriceIncl' => '42.35', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '35', 'AmountIncl' => '42.35'], 'NodeInfo' => ['Name' => 'Example VPS Node', 'Images' => [0 => ['Node' => '1', 'Key' => 'img1', 'ImageName' => 'An example image', 'Status' => 'active']], 'Platform' => 'apiexample', 'Location' => 'a', 'Port' => ''], 'Translations' => ['PackageName' => 'VPS package 1', 'NodeName' => 'Example VPS Node', 'ImageName' => 'An example image']]], $vps);
    }

    /** @test */
    public function it_can_send_account_data_by_email_of_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"sendaccountdatabyemail","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De e-mail met accountgegevens voor de VPS vps1.example.com is verzonden naar info@company.com"]}')
        );

        $vps = $this->hostFact->vps()->sendAccountDataByEmail([
            'Hostname' => 'vps1.example.com'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'sendaccountdatabyemail', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De e-mail met accountgegevens voor de VPS vps1.example.com is verzonden naar info@company.com']], $vps);
    }

    /** @test */
    public function it_can_show_an_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","vps":{"Identifier":"1","Hostname":"vps1.example.com","Debtor":"1","DebtorCode":"DB0001","IPAddress":"123.45.67.89","Package":"1","Node":"1","ServerID":"1234","Image":"img1","MemoryMB":"500","DiskSpaceGB":"20","BandWidthGB":"20","CPUCores":"1","Comment":"","Status":"active","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P005","Description":"VPS package 1","PriceExcl":"35","PriceIncl":"42.35","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"35","AmountIncl":"42.35"},"NodeInfo":{"Name":"Example VPS Node","Images":[{"Node":"1","Key":"img1","ImageName":"An example image","Status":"active"}],"Platform":"apiexample","Location":"a","Port":""},"Translations":{"PackageName":"VPS package 1","NodeName":"Example VPS Node","ImageName":"An example image"}}}')
        );

        $vps = $this->hostFact->vps()->show([
            'Hostname' => 'vps1.example.com'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'vps' => ['Identifier' => '1', 'Hostname' => 'vps1.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '123.45.67.89', 'Package' => '1', 'Node' => '1', 'ServerID' => '1234', 'Image' => 'img1', 'MemoryMB' => '500', 'DiskSpaceGB' => '20', 'BandWidthGB' => '20', 'CPUCores' => '1', 'Comment' => '', 'Status' => 'active', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P005', 'Description' => 'VPS package 1', 'PriceExcl' => '35', 'PriceIncl' => '42.35', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '35', 'AmountIncl' => '42.35'], 'NodeInfo' => ['Name' => 'Example VPS Node', 'Images' => [0 => ['Node' => '1', 'Key' => 'img1', 'ImageName' => 'An example image', 'Status' => 'active']], 'Platform' => 'apiexample', 'Location' => 'a', 'Port' => ''], 'Translations' => ['PackageName' => 'VPS package 1', 'NodeName' => 'Example VPS Node', 'ImageName' => 'An example image']]], $vps);
    }

    /** @test */
    public function it_can_start_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"start","status":"success","date":"2019-05-20T12:00:00+02:00","success":["VPS vps1.example.com is succesvol gestart"],"vps":{"Identifier":"1","Hostname":"vps1.example.com","Debtor":"1","DebtorCode":"DB0001","IPAddress":"123.45.67.89","Package":"1","Node":"1","ServerID":"1234","Image":"img1","MemoryMB":"500","DiskSpaceGB":"20","BandWidthGB":"20","CPUCores":"1","Comment":"","Status":"active","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P005","Description":"VPS package 1","PriceExcl":"35","PriceIncl":"42.35","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"35","AmountIncl":"42.35"},"NodeInfo":{"Name":"Example VPS Node","Images":[{"Node":"1","Key":"img1","ImageName":"An example image","Status":"active"}],"Platform":"apiexample","Location":"a","Port":""},"Translations":{"PackageName":"VPS package 1","NodeName":"Example VPS Node","ImageName":"An example image"}}}')
        );

        $vps = $this->hostFact->vps()->start([
            'Hostname' => 'vps1.example.com'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'start', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'VPS vps1.example.com is succesvol gestart'], 'vps' => ['Identifier' => '1', 'Hostname' => 'vps1.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '123.45.67.89', 'Package' => '1', 'Node' => '1', 'ServerID' => '1234', 'Image' => 'img1', 'MemoryMB' => '500', 'DiskSpaceGB' => '20', 'BandWidthGB' => '20', 'CPUCores' => '1', 'Comment' => '', 'Status' => 'active', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P005', 'Description' => 'VPS package 1', 'PriceExcl' => '35', 'PriceIncl' => '42.35', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '35', 'AmountIncl' => '42.35'], 'NodeInfo' => ['Name' => 'Example VPS Node', 'Images' => [0 => ['Node' => '1', 'Key' => 'img1', 'ImageName' => 'An example image', 'Status' => 'active']], 'Platform' => 'apiexample', 'Location' => 'a', 'Port' => ''], 'Translations' => ['PackageName' => 'VPS package 1', 'NodeName' => 'Example VPS Node', 'ImageName' => 'An example image']]], $vps);
    }

    /** @test */
    public function it_can_suspend_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"suspend","status":"success","date":"2015-05-15T12:19:22+02:00","success":["VPS vps1.hostfact.nl is geblokkeerd"],"vps":{"Identifier":"1","Hostname":"vps1.hostfact.nl","Debtor":"1","DebtorCode":"DB0001","IPAddress":"213.187.244.16","Package":"1","Node":"1","ServerID":"42fac662-d339-4d10-bafd-8b0e2ff3af48","Image":"ba81185b-b1b8-4f3f-a490-1bc011690532","MemoryMB":"","DiskSpaceGB":"","BandWidthGB":"","CPUCores":"","Comment":"","Status":"suspended","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P001","Description":"VPS Pakket 1 (CentOS 7)","PriceExcl":"20","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2015-05-15","EndPeriod":"2015-06-15","NextDate":"2015-05-01","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2015-05-15","EndContract":"2015-06-15","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes"},"Translations":{"PackageName":"VPS Pakket 1 (CentOS 7)","NodeName":"Openstack","ImageName":"CloudVPS CentOS 7"}}}')
        );

        $vps = $this->hostFact->vps()->suspend([
            'Hostname' => 'vps1.example.com'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'suspend', 'status' => 'success', 'date' => '2015-05-15T12:19:22+02:00', 'success' => [0 => 'VPS vps1.hostfact.nl is geblokkeerd'], 'vps' => ['Identifier' => '1', 'Hostname' => 'vps1.hostfact.nl', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '213.187.244.16', 'Package' => '1', 'Node' => '1', 'ServerID' => '42fac662-d339-4d10-bafd-8b0e2ff3af48', 'Image' => 'ba81185b-b1b8-4f3f-a490-1bc011690532', 'MemoryMB' => '', 'DiskSpaceGB' => '', 'BandWidthGB' => '', 'CPUCores' => '', 'Comment' => '', 'Status' => 'suspended', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P001', 'Description' => 'VPS Pakket 1 (CentOS 7)', 'PriceExcl' => '20', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2015-05-15', 'EndPeriod' => '2015-06-15', 'NextDate' => '2015-05-01', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2015-05-15', 'EndContract' => '2015-06-15', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes'], 'Translations' => ['PackageName' => 'VPS Pakket 1 (CentOS 7)', 'NodeName' => 'Openstack', 'ImageName' => 'CloudVPS CentOS 7']]], $vps);
    }

    /** @test */
    public function it_can_terminate_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"terminate","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Dienst is opgezegd met opzegdatum 01-01-2016"],"vps":{"Identifier":"1","Hostname":"vps1.example.com","Debtor":"1","DebtorCode":"DB0001","IPAddress":"123.45.67.89","Package":"1","Node":"1","ServerID":"1234","Image":"img1","MemoryMB":"500","DiskSpaceGB":"20","BandWidthGB":"20","CPUCores":"1","Comment":"","Status":"active","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P005","Description":"VPS package 1","PriceExcl":"35","PriceIncl":"42.35","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"2016-01-01","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"35","AmountIncl":"42.35"},"NodeInfo":{"Name":"Example VPS Node","Images":[{"Node":"1","Key":"img1","ImageName":"An example image","Status":"active"}],"Platform":"apiexample","Location":"a","Port":""},"Translations":{"PackageName":"VPS package 1","NodeName":"Example VPS Node","ImageName":"An example image"},"Termination":{"Date":"2016-01-01","Created":"2019-05-20 12:00:00","Status":"pending"}}}')
        );

        $vps = $this->hostFact->vps()->terminate([
            'Hostname' => 'vps1.example.com',
            'Date' => '2016-01-01'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'terminate', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Dienst is opgezegd met opzegdatum 01-01-2016'], 'vps' => ['Identifier' => '1', 'Hostname' => 'vps1.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '123.45.67.89', 'Package' => '1', 'Node' => '1', 'ServerID' => '1234', 'Image' => 'img1', 'MemoryMB' => '500', 'DiskSpaceGB' => '20', 'BandWidthGB' => '20', 'CPUCores' => '1', 'Comment' => '', 'Status' => 'active', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P005', 'Description' => 'VPS package 1', 'PriceExcl' => '35', 'PriceIncl' => '42.35', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '2016-01-01', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '35', 'AmountIncl' => '42.35'], 'NodeInfo' => ['Name' => 'Example VPS Node', 'Images' => [0 => ['Node' => '1', 'Key' => 'img1', 'ImageName' => 'An example image', 'Status' => 'active']], 'Platform' => 'apiexample', 'Location' => 'a', 'Port' => ''], 'Translations' => ['PackageName' => 'VPS package 1', 'NodeName' => 'Example VPS Node', 'ImageName' => 'An example image'], 'Termination' => ['Date' => '2016-01-01', 'Created' => '2019-05-20 12:00:00', 'Status' => 'pending']]], $vps);
    }

    /** @test */
    public function it_can_unsuspend_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"unsuspend","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De blokkering van de VPS vps1.example.com is opgeheven, de VPS is weer actief"],"vps":{"Identifier":"1","Hostname":"vps1.example.com","Debtor":"1","DebtorCode":"DB0001","IPAddress":"123.45.67.89","Package":"1","Node":"1","ServerID":"1234","Image":"img1","MemoryMB":"500","DiskSpaceGB":"20","BandWidthGB":"20","CPUCores":"1","Comment":"","Status":"active","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P005","Description":"VPS package 1","PriceExcl":"35","PriceIncl":"42.35","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"35","AmountIncl":"42.35"},"NodeInfo":{"Name":"Example VPS Node","Images":[{"Node":"1","Key":"img1","ImageName":"An example image","Status":"active"}],"Platform":"apiexample","Location":"a","Port":""},"Translations":{"PackageName":"VPS package 1","NodeName":"Example VPS Node","ImageName":"An example image"}}}')
        );

        $vps = $this->hostFact->vps()->unsuspend([
            'Hostname' => 'vps1.example.com'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'unsuspend', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De blokkering van de VPS vps1.example.com is opgeheven, de VPS is weer actief'], 'vps' => ['Identifier' => '1', 'Hostname' => 'vps1.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '123.45.67.89', 'Package' => '1', 'Node' => '1', 'ServerID' => '1234', 'Image' => 'img1', 'MemoryMB' => '500', 'DiskSpaceGB' => '20', 'BandWidthGB' => '20', 'CPUCores' => '1', 'Comment' => '', 'Status' => 'active', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P005', 'Description' => 'VPS package 1', 'PriceExcl' => '35', 'PriceIncl' => '42.35', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '35', 'AmountIncl' => '42.35'], 'NodeInfo' => ['Name' => 'Example VPS Node', 'Images' => [0 => ['Node' => '1', 'Key' => 'img1', 'ImageName' => 'An example image', 'Status' => 'active']], 'Platform' => 'apiexample', 'Location' => 'a', 'Port' => ''], 'Translations' => ['PackageName' => 'VPS package 1', 'NodeName' => 'Example VPS Node', 'ImageName' => 'An example image']]], $vps);
    }

    /** @test */
    public function it_can_update_an_existing_vps()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"vps","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Dienst is bewerkt"],"vps":{"Identifier":"1","Hostname":"vps1.example.com","Debtor":"1","DebtorCode":"DB0001","IPAddress":"123.45.67.89","Package":"1","Node":"1","ServerID":"1234","Image":"img1","MemoryMB":"500","DiskSpaceGB":"20","BandWidthGB":"20","CPUCores":"1","Comment":"Suspend after May","Status":"active","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P005","Description":"VPS package 1","PriceExcl":"35","PriceIncl":"42.35","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"35","AmountIncl":"42.35"},"NodeInfo":{"Name":"Example VPS Node","Images":[{"Node":"1","Key":"img1","ImageName":"An example image","Status":"active"}],"Platform":"apiexample","Location":"a","Port":""},"Translations":{"PackageName":"VPS package 1","NodeName":"Example VPS Node","ImageName":"An example image"}}}')
        );

        $vps = $this->hostFact->vps()->edit([
            'Hostname' => 'vps1.example.com',
            'Comment' => 'Suspend after May'
        ]);

        $this->assertSame(['controller' => 'vps', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Dienst is bewerkt'], 'vps' => ['Identifier' => '1', 'Hostname' => 'vps1.example.com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'IPAddress' => '123.45.67.89', 'Package' => '1', 'Node' => '1', 'ServerID' => '1234', 'Image' => 'img1', 'MemoryMB' => '500', 'DiskSpaceGB' => '20', 'BandWidthGB' => '20', 'CPUCores' => '1', 'Comment' => 'Suspend after May', 'Status' => 'active', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P005', 'Description' => 'VPS package 1', 'PriceExcl' => '35', 'PriceIncl' => '42.35', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '35', 'AmountIncl' => '42.35'], 'NodeInfo' => ['Name' => 'Example VPS Node', 'Images' => [0 => ['Node' => '1', 'Key' => 'img1', 'ImageName' => 'An example image', 'Status' => 'active']], 'Platform' => 'apiexample', 'Location' => 'a', 'Port' => ''], 'Translations' => ['PackageName' => 'VPS package 1', 'NodeName' => 'Example VPS Node', 'ImageName' => 'An example image']]], $vps);
    }
}