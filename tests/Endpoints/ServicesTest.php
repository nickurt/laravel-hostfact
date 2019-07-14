<?php

namespace nickurt\HostFact\Tests\Endpoints;

class ServicesTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_create_a_new_service()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"service","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Dienst is aangemaakt"],"service":{"Identifier":"12","Debtor":"1","DebtorCode":"DB0001","Status":"active","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P001","Description":"Default product","PriceExcl":"250","PriceIncl":"302.5","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2019-05-17","EndPeriod":"2019-06-17","NextDate":"2019-05-03","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2019-05-17","EndContract":"2019-06-17","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"250","AmountIncl":"302.5"},"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00"}}')
        );

        $service = $this->hostFact->services()->add([
            'DebtorCode' => 'DB0001',
            'Subscription' => [
                'ProductCode' => 'P001',
                'Periods' => 1,
                'Periodic' => 'm'
            ]
        ]);

        $this->assertSame(['controller' => 'service', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Dienst is aangemaakt'], 'service' => ['Identifier' => '12', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => 'active', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P001', 'Description' => 'Default product', 'PriceExcl' => '250', 'PriceIncl' => '302.5', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2019-05-17', 'EndPeriod' => '2019-06-17', 'NextDate' => '2019-05-03', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2019-05-17', 'EndContract' => '2019-06-17', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '250', 'AmountIncl' => '302.5'], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00']], $service);
    }

    /** @test */
    public function it_can_edit_an_existing_service()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"service","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","service":{"Identifier":"1","Debtor":"1","DebtorCode":"DB0001","Status":"active","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P001","Description":"Default product","PriceExcl":"250","PriceIncl":"302.5","TaxPercentage":"21","DiscountPercentage":"0","Periods":"2","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-05-14","NextDate":"2018-02-28","ContractPeriods":"2","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"500","AmountIncl":"605"},"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00"}}')
        );

        $service = $this->hostFact->services()->edit([
            'Identifier' => '1',
            'Subscription' => [
                // 'PriceExcl' => 10,
                'Periods' => 2,
                // 'Periodic' => 'm'
            ]
        ]);

        $this->assertSame(['controller' => 'service', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'service' => ['Identifier' => '1', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => 'active', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P001', 'Description' => 'Default product', 'PriceExcl' => '250', 'PriceIncl' => '302.5', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '2', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-05-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '2', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '500', 'AmountIncl' => '605'], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00']], $service);
    }

    /** @test */
    public function it_can_list_all_the_services()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"service","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"3","currentresults":"3","offset":"0","filters":{"searchfor":""},"services":[{"Identifier":"1","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Status":"active","Subscription":{"ProductCode":"P001","Description":"Default product","Number":"1","NumberSuffix":"","PriceExcl":"250","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","TerminationDate":"","AmountExcl":"250","AmountIncl":"302.5"},"Modified":"2019-05-20 12:00:00"},{"Identifier":"6","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Status":"active","Subscription":{"ProductCode":"P003","Description":"Domain example.com","Number":"1","NumberSuffix":"","PriceExcl":"15","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2019-07-14","NextDate":"2018-06-30","TerminationDate":"","AmountExcl":"15","AmountIncl":"18.15"},"Modified":"2019-05-20 12:00:00"},{"Identifier":"7","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Status":"active","Subscription":{"ProductCode":"P003","Description":"Domain example.com","Number":"1","NumberSuffix":"","PriceExcl":"15","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2019-07-14","NextDate":"2018-06-30","TerminationDate":"","AmountExcl":"15","AmountIncl":"18.15"},"Modified":"2019-05-20 12:00:00"}]}')
        );

        $service = $this->hostFact->services()->list([
            'searchfor' => ''
        ]);

        $this->assertSame(['controller' => 'service', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '3', 'currentresults' => '3', 'offset' => '0', 'filters' => ['searchfor' => ''], 'services' => [0 => ['Identifier' => '1', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Status' => 'active', 'Subscription' => ['ProductCode' => 'P001', 'Description' => 'Default product', 'Number' => '1', 'NumberSuffix' => '', 'PriceExcl' => '250', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'TerminationDate' => '', 'AmountExcl' => '250', 'AmountIncl' => '302.5'], 'Modified' => '2019-05-20 12:00:00'], 1 => ['Identifier' => '6', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Status' => 'active', 'Subscription' => ['ProductCode' => 'P003', 'Description' => 'Domain example.com', 'Number' => '1', 'NumberSuffix' => '', 'PriceExcl' => '15', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2019-07-14', 'NextDate' => '2018-06-30', 'TerminationDate' => '', 'AmountExcl' => '15', 'AmountIncl' => '18.15'], 'Modified' => '2019-05-20 12:00:00'], 2 => ['Identifier' => '7', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Status' => 'active', 'Subscription' => ['ProductCode' => 'P003', 'Description' => 'Domain example.com', 'Number' => '1', 'NumberSuffix' => '', 'PriceExcl' => '15', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2019-07-14', 'NextDate' => '2018-06-30', 'TerminationDate' => '', 'AmountExcl' => '15', 'AmountIncl' => '18.15'], 'Modified' => '2019-05-20 12:00:00']]], $service);
    }

    /** @test */
    public function it_can_show_an_service()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"service","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","service":{"Identifier":"1","Debtor":"1","DebtorCode":"DB0001","Status":"active","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P001","Description":"Default product","PriceExcl":"250","PriceIncl":"302.5","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"250","AmountIncl":"302.5"},"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00"}}')
        );

        $service = $this->hostFact->services()->show([
            'Identifier' => '1'
        ]);

        $this->assertSame(['controller' => 'service', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'service' => ['Identifier' => '1', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => 'active', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P001', 'Description' => 'Default product', 'PriceExcl' => '250', 'PriceIncl' => '302.5', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '250', 'AmountIncl' => '302.5'], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00']], $service);
    }

    /** @test */
    public function it_can_terminate_an_existing_service()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"service","action":"terminate","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Dienst is opgezegd met opzegdatum 14-07-2019"],"service":{"Identifier":"1","Debtor":"1","DebtorCode":"DB0001","Status":"active","Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P001","Description":"Default product","PriceExcl":"250","PriceIncl":"302.5","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"m","StartPeriod":"2018-03-14","EndPeriod":"2018-04-14","NextDate":"2018-02-28","ContractPeriods":"1","ContractPeriodic":"m","StartContract":"2018-01-14","EndContract":"2018-08-14","TerminationDate":"2019-07-14","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"250","AmountIncl":"302.5"},"Termination":{"Date":"2019-07-14","Created":"2019-05-20 12:00:00","Status":"pending"},"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00"}}')
        );

        $service = $this->hostFact->services()->terminate([
            'Identifier' => '1',
            // 'Date' => '2015-01-01'
        ]);

        $this->assertSame(['controller' => 'service', 'action' => 'terminate', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Dienst is opgezegd met opzegdatum 14-07-2019'], 'service' => ['Identifier' => '1', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => 'active', 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P001', 'Description' => 'Default product', 'PriceExcl' => '250', 'PriceIncl' => '302.5', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-03-14', 'EndPeriod' => '2018-04-14', 'NextDate' => '2018-02-28', 'ContractPeriods' => '1', 'ContractPeriodic' => 'm', 'StartContract' => '2018-01-14', 'EndContract' => '2018-08-14', 'TerminationDate' => '2019-07-14', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '250', 'AmountIncl' => '302.5'], 'Termination' => ['Date' => '2019-07-14', 'Created' => '2019-05-20 12:00:00', 'Status' => 'pending'], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00']], $service);
    }
}