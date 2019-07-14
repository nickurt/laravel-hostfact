<?php

namespace nickurt\HostFact\Tests\Endpoints;

class CreditInvoicesTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_line_to_an_existing_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditinvoiceline","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Er zijn 1 factuurregels toegevoegd"],"creditinvoice":{"Identifier":"1","CreditInvoiceCode":"CF0001","InvoiceCode":"2018-6422","Creditor":"1","CreditorCode":"CD0001","Status":"1","Date":"2018-01-01","Term":"0","AmountExcl":"212.50","AmountIncl":"196.63","AmountPaid":"0.00","Authorisation":"no","Private":"0.00","PrivatePercentage":"0","ReferenceNumber":"","PayDate":"","InvoiceLines":[{"Identifier":"1","Number":"1","Description":"SLA contract #2","PriceExcl":"125","TaxPercentage":"21"},{"Identifier":"2","Number":"3","Description":"Domains .com","PriceExcl":"12.5","TaxPercentage":"21"},{"Identifier":"3","Number":"1","Description":"Additional service","PriceExcl":"50","TaxPercentage":"21"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Attachments":[{"Identifier":"3","Filename":"sample.pdf"}],"Translations":{"Status":"Nog niet betaald"}}}')
        );

        $invoice = $this->hostFact->creditinvoices()->line()->add([
            'CreditInvoiceCode' => 'CF0001',
            'InvoiceLines' => [
                [
                    'Description' => 'Additional service',
                    'PriceExcl' => 50
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'creditinvoiceline', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Er zijn 1 factuurregels toegevoegd'], 'creditinvoice' => ['Identifier' => '1', 'CreditInvoiceCode' => 'CF0001', 'InvoiceCode' => '2018-6422', 'Creditor' => '1', 'CreditorCode' => 'CD0001', 'Status' => '1', 'Date' => '2018-01-01', 'Term' => '0', 'AmountExcl' => '212.50', 'AmountIncl' => '196.63', 'AmountPaid' => '0.00', 'Authorisation' => 'no', 'Private' => '0.00', 'PrivatePercentage' => '0', 'ReferenceNumber' => '', 'PayDate' => '', 'InvoiceLines' => [0 => ['Identifier' => '1', 'Number' => '1', 'Description' => 'SLA contract #2', 'PriceExcl' => '125', 'TaxPercentage' => '21'], 1 => ['Identifier' => '2', 'Number' => '3', 'Description' => 'Domains .com', 'PriceExcl' => '12.5', 'TaxPercentage' => '21'], 2 => ['Identifier' => '3', 'Number' => '1', 'Description' => 'Additional service', 'PriceExcl' => '50', 'TaxPercentage' => '21']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Attachments' => [0 => ['Identifier' => '3', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Nog niet betaald']]], $invoice);
    }

    /** @test */
    public function it_can_add_a_new_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditinvoice","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","creditinvoice":{"Identifier":"2","CreditInvoiceCode":"CF0002","InvoiceCode":"2013-6422","Creditor":"1","CreditorCode":"CD0001","Status":"1","Date":"2013-12-04","Term":"0","AmountExcl":"162.50","AmountIncl":"196.63","AmountPaid":"0.00","Authorisation":"no","Private":"0.00","PrivatePercentage":"0","ReferenceNumber":"","PayDate":"","InvoiceLines":[{"Identifier":"3","Number":"1","Description":"SLA contract #2","PriceExcl":"125","TaxPercentage":"21"},{"Identifier":"4","Number":"3","Description":"Domains .com","PriceExcl":"12.5","TaxPercentage":"21"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Status":"Nog niet betaald"}}}')
        );

        $invoice = $this->hostFact->creditinvoices()->add([
            'CreditorCode' => 'CD0001',
            'InvoiceCode' => '2013-6422',
            'Date' => '2013-12-04',
            'InvoiceLines' => [
                [
                    'Description' => 'SLA contract #2',
                    'PriceExcl' => 125
                ],
                [
                    'Number' => 3,
                    'Description' => 'Domains .com',
                    'PriceExcl' => 12.50
                ],
            ]
        ]);

        $this->assertSame(['controller' => 'creditinvoice', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'creditinvoice' => ['Identifier' => '2', 'CreditInvoiceCode' => 'CF0002', 'InvoiceCode' => '2013-6422', 'Creditor' => '1', 'CreditorCode' => 'CD0001', 'Status' => '1', 'Date' => '2013-12-04', 'Term' => '0', 'AmountExcl' => '162.50', 'AmountIncl' => '196.63', 'AmountPaid' => '0.00', 'Authorisation' => 'no', 'Private' => '0.00', 'PrivatePercentage' => '0', 'ReferenceNumber' => '', 'PayDate' => '', 'InvoiceLines' => [0 => ['Identifier' => '3', 'Number' => '1', 'Description' => 'SLA contract #2', 'PriceExcl' => '125', 'TaxPercentage' => '21'], 1 => ['Identifier' => '4', 'Number' => '3', 'Description' => 'Domains .com', 'PriceExcl' => '12.5', 'TaxPercentage' => '21']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Status' => 'Nog niet betaald']]], $invoice);
    }

    /** @test */
    public function it_can_add_an_attachement_to_an_existing_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de crediteur"]}')
        );

        $invoice = $this->hostFact->creditinvoices()->attachments()->add([
            'CreditInvoiceCode' => 'CF0001',
            'Type' => 'creditinvoice',
            'Filename' => 'sample.pdf',
            'Base64' => 'JVBERi0xLj...UlRU9GCg=='
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de crediteur']], $invoice);
    }

    /** @test */
    public function it_can_delete_a_line_to_an_existing_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditinvoiceline","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Er zijn 1 factuurregels verwijderd"],"creditinvoice":{"Identifier":"1","CreditInvoiceCode":"CF0001","InvoiceCode":"2018-6422","Creditor":"1","CreditorCode":"CD0001","Status":"1","Date":"2018-01-01","Term":"0","AmountExcl":"125.00","AmountIncl":"196.63","AmountPaid":"0.00","Authorisation":"no","Private":"0.00","PrivatePercentage":"0","ReferenceNumber":"","PayDate":"","InvoiceLines":[{"Identifier":"1","Number":"1","Description":"SLA contract #2","PriceExcl":"125","TaxPercentage":"21"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Attachments":[{"Identifier":"3","Filename":"sample.pdf"}],"Translations":{"Status":"Nog niet betaald"}}}')
        );

        $invoice = $this->hostFact->creditinvoices()->line()->delete([
            'CreditInvoiceCode' => 'CF0001',
            'InvoiceLines' => [
                [
                    'Identifier' => '2'
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'creditinvoiceline', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Er zijn 1 factuurregels verwijderd'], 'creditinvoice' => ['Identifier' => '1', 'CreditInvoiceCode' => 'CF0001', 'InvoiceCode' => '2018-6422', 'Creditor' => '1', 'CreditorCode' => 'CD0001', 'Status' => '1', 'Date' => '2018-01-01', 'Term' => '0', 'AmountExcl' => '125.00', 'AmountIncl' => '196.63', 'AmountPaid' => '0.00', 'Authorisation' => 'no', 'Private' => '0.00', 'PrivatePercentage' => '0', 'ReferenceNumber' => '', 'PayDate' => '', 'InvoiceLines' => [0 => ['Identifier' => '1', 'Number' => '1', 'Description' => 'SLA contract #2', 'PriceExcl' => '125', 'TaxPercentage' => '21']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Attachments' => [0 => ['Identifier' => '3', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Nog niet betaald']]], $invoice);
    }

    /** @test */
    public function it_can_delete_an_attachement_of_an_existing_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De bijlage \'sample.pdf\' is verwijderd"]}')
        );

        $invoice = $this->hostFact->creditinvoices()->attachments()->delete([
            'CreditInvoiceCode' => 'CF0001',
            'Type' => 'creditinvoice'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De bijlage \'sample.pdf\' is verwijderd']], $invoice);
    }

    /** @test */
    public function it_can_delete_an_existing_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditinvoice","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Inkoopfactuur CF0001 is verwijderd"]}')
        );

        $invoice = $this->hostFact->creditinvoices()->delete([
            'Identifier' => '1',
            // 'CreditInvoiceCode' => 'CF0001'
        ]);

        $this->assertSame(['controller' => 'creditinvoice', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Inkoopfactuur CF0001 is verwijderd']], $invoice);
    }

    /** @test */
    public function it_can_do_a_part_payent_of_an_existing_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditinvoice","action":"partpayment","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Deelbetaling bij factuur CF0001 is verwerkt"],"creditinvoice":{"Identifier":"1","CreditInvoiceCode":"CF0001","InvoiceCode":"2018-6422","Creditor":"1","CreditorCode":"CD0001","Status":"2","Date":"2018-01-01","Term":"0","AmountExcl":"162.50","AmountIncl":"196.63","AmountPaid":"162.50","Authorisation":"no","Private":"0.00","PrivatePercentage":"0","ReferenceNumber":"","PayDate":"","InvoiceLines":[{"Identifier":"1","Number":"1","Description":"SLA contract #2","PriceExcl":"125","TaxPercentage":"21"},{"Identifier":"2","Number":"3","Description":"Domains .com","PriceExcl":"12.5","TaxPercentage":"21"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Attachments":[{"Identifier":"3","Filename":"sample.pdf"}],"Translations":{"Status":"Deels betaald"}}}')
        );

        $invoice = $this->hostFact->creditinvoices()->partPayment([
            'CreditInvoiceCode' => 'CF0001',
            'AmountPaid' => 162.50
        ]);

        $this->assertSame(['controller' => 'creditinvoice', 'action' => 'partpayment', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Deelbetaling bij factuur CF0001 is verwerkt'], 'creditinvoice' => ['Identifier' => '1', 'CreditInvoiceCode' => 'CF0001', 'InvoiceCode' => '2018-6422', 'Creditor' => '1', 'CreditorCode' => 'CD0001', 'Status' => '2', 'Date' => '2018-01-01', 'Term' => '0', 'AmountExcl' => '162.50', 'AmountIncl' => '196.63', 'AmountPaid' => '162.50', 'Authorisation' => 'no', 'Private' => '0.00', 'PrivatePercentage' => '0', 'ReferenceNumber' => '', 'PayDate' => '', 'InvoiceLines' => [0 => ['Identifier' => '1', 'Number' => '1', 'Description' => 'SLA contract #2', 'PriceExcl' => '125', 'TaxPercentage' => '21'], 1 => ['Identifier' => '2', 'Number' => '3', 'Description' => 'Domains .com', 'PriceExcl' => '12.5', 'TaxPercentage' => '21']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Attachments' => [0 => ['Identifier' => '3', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Deels betaald']]], $invoice);
    }

    /** @test */
    public function it_can_download_an_attachement_of_an_existing_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"download","status":"success","date":"2019-05-20T12:00:00+02:00","success":["sample.pdf","JVBERi0xLj...olJUVPRg=="]}')
        );

        $invoice = $this->hostFact->creditinvoices()->attachments()->download([
            'CreditInvoiceCode' => 'CF0001',
            'Type' => 'creditinvoice'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'download', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'sample.pdf', 1 => 'JVBERi0xLj...olJUVPRg==']], $invoice);
    }

    /** @test */
    public function it_can_edit_an_existing_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditinvoice","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","creditinvoice":{"Identifier":"1","CreditInvoiceCode":"CF0001","InvoiceCode":"2018-6422","Creditor":"1","CreditorCode":"CD0001","Status":"1","Date":"2018-01-01","Term":"14","AmountExcl":"162.50","AmountIncl":"196.63","AmountPaid":"0.00","Authorisation":"no","Private":"0.00","PrivatePercentage":"0","ReferenceNumber":"","PayDate":"","InvoiceLines":[{"Identifier":"1","Number":"1","Description":"SLA contract #2","PriceExcl":"125","TaxPercentage":"21"},{"Identifier":"2","Number":"3","Description":"Domains .com","PriceExcl":"12.5","TaxPercentage":"21"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Attachments":[{"Identifier":"3","Filename":"sample.pdf"}],"Translations":{"Status":"Nog niet betaald"}}}')
        );

        $invoice = $this->hostFact->creditinvoices()->edit([
            'CreditInvoiceCode' => 'CF0001',
            'Term' => '14'
        ]);

        $this->assertSame(['controller' => 'creditinvoice', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'creditinvoice' => ['Identifier' => '1', 'CreditInvoiceCode' => 'CF0001', 'InvoiceCode' => '2018-6422', 'Creditor' => '1', 'CreditorCode' => 'CD0001', 'Status' => '1', 'Date' => '2018-01-01', 'Term' => '14', 'AmountExcl' => '162.50', 'AmountIncl' => '196.63', 'AmountPaid' => '0.00', 'Authorisation' => 'no', 'Private' => '0.00', 'PrivatePercentage' => '0', 'ReferenceNumber' => '', 'PayDate' => '', 'InvoiceLines' => [0 => ['Identifier' => '1', 'Number' => '1', 'Description' => 'SLA contract #2', 'PriceExcl' => '125', 'TaxPercentage' => '21'], 1 => ['Identifier' => '2', 'Number' => '3', 'Description' => 'Domains .com', 'PriceExcl' => '12.5', 'TaxPercentage' => '21']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Attachments' => [0 => ['Identifier' => '3', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Nog niet betaald']]], $invoice);
    }

    /** @test */
    public function it_can_get_all_the_credit_invoices()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditinvoice","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"1","currentresults":"1","offset":"0","creditinvoices":[{"Identifier":"1","CreditInvoiceCode":"CF0001","InvoiceCode":"2018-6422","Creditor":"1","CompanyName":"Supplier 1","Initials":"Curtis","SurName":"Johnson","Date":"2018-01-01","AmountExcl":"162.50","AmountIncl":"196.63","PartPayment":"196.63","Term":"0","Authorisation":"no","PayDate":"","PayBefore":"2018-01-01","Status":"1","Modified":"2019-05-20 12:00:00"}]}')
        );

        $invoice = $this->hostFact->creditinvoices()->list([
            // 'searchat' => 'Date',
            // 'searchfor' => '2013-12-04'
        ]);

        $this->assertSame(['controller' => 'creditinvoice', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '1', 'currentresults' => '1', 'offset' => '0', 'creditinvoices' => [0 => ['Identifier' => '1', 'CreditInvoiceCode' => 'CF0001', 'InvoiceCode' => '2018-6422', 'Creditor' => '1', 'CompanyName' => 'Supplier 1', 'Initials' => 'Curtis', 'SurName' => 'Johnson', 'Date' => '2018-01-01', 'AmountExcl' => '162.50', 'AmountIncl' => '196.63', 'PartPayment' => '196.63', 'Term' => '0', 'Authorisation' => 'no', 'PayDate' => '', 'PayBefore' => '2018-01-01', 'Status' => '1', 'Modified' => '2019-05-20 12:00:00']]], $invoice);
    }

    /** @test */
    public function it_can_mark_as_paid_for_an_existing_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditinvoice","action":"markaspaid","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Factuur CF0001 is betaald."]}')
        );

        $invoice = $this->hostFact->creditinvoices()->markAsPaid([
            'CreditInvoiceCode' => 'CF0001'
        ]);

        $this->assertSame(['controller' => 'creditinvoice', 'action' => 'markaspaid', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Factuur CF0001 is betaald.']], $invoice);
    }

    /** @test */
    public function it_can_show_the_credit_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"creditinvoice","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","creditinvoice":{"Identifier":"1","CreditInvoiceCode":"CF0001","InvoiceCode":"2018-6422","Creditor":"1","CreditorCode":"CD0001","Status":"1","Date":"2018-01-01","Term":"0","AmountExcl":"162.50","AmountIncl":"196.63","AmountPaid":"0.00","Authorisation":"no","Private":"0.00","PrivatePercentage":"0","ReferenceNumber":"","PayDate":"","InvoiceLines":[{"Identifier":"1","Number":"1","Description":"SLA contract #2","PriceExcl":"125","TaxPercentage":"21"},{"Identifier":"2","Number":"3","Description":"Domains .com","PriceExcl":"12.5","TaxPercentage":"21"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Attachments":[{"Identifier":"3","Filename":"sample.pdf"}],"Translations":{"Status":"Nog niet betaald"}}}')
        );

        $invoice = $this->hostFact->creditinvoices()->show([
            'CreditInvoiceCode' => 'CF0001'
        ]);

        $this->assertSame(['controller' => 'creditinvoice', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'creditinvoice' => ['Identifier' => '1', 'CreditInvoiceCode' => 'CF0001', 'InvoiceCode' => '2018-6422', 'Creditor' => '1', 'CreditorCode' => 'CD0001', 'Status' => '1', 'Date' => '2018-01-01', 'Term' => '0', 'AmountExcl' => '162.50', 'AmountIncl' => '196.63', 'AmountPaid' => '0.00', 'Authorisation' => 'no', 'Private' => '0.00', 'PrivatePercentage' => '0', 'ReferenceNumber' => '', 'PayDate' => '', 'InvoiceLines' => [0 => ['Identifier' => '1', 'Number' => '1', 'Description' => 'SLA contract #2', 'PriceExcl' => '125', 'TaxPercentage' => '21'], 1 => ['Identifier' => '2', 'Number' => '3', 'Description' => 'Domains .com', 'PriceExcl' => '12.5', 'TaxPercentage' => '21']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Attachments' => [0 => ['Identifier' => '3', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Nog niet betaald']]], $invoice);
    }
}