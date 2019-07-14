<?php

namespace nickurt\HostFact\Tests\Endpoints;

class InvoicesTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","invoice":{"Identifier":"6","InvoiceCode":"[concept]0002","Debtor":"1","DebtorCode":"DB0001","Status":"0","SubStatus":"","Date":"2019-05-17","Term":"14","PayBefore":"2019-05-31","PaymentURL":"","AmountExcl":"165.00","AmountTax":"34.65","AmountIncl":"199.65","TaxRate":"0","Compound":"no","AmountPaid":"0.00","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","ScheduledAt":"","SentDate":"","Sent":"0","Reminders":"0","ReminderDate":"","Summations":"0","SummationDate":"","Authorisation":"no","PaymentMethod":"","PayDate":"","TransactionID":"","Description":"","Comment":"","InvoiceLines":[{"Identifier":"113","Date":"2019-05-17","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"0","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"114","Date":"2019-05-17","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"12","Periods":"1","Periodic":"j","StartPeriod":"2019-05-17","EndPeriod":"2020-05-17","ProductType":"","Reference":"0","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Status":"Concept","Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":""},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $invoice = $this->hostFact->invoices()->add([
            'DebtorCode' => 'DB0001',
            'InvoiceLines' => [
                [
                    'Description' => 'Setupfee',
                    'PriceExcl' => 150
                ],
                [
                    'ProductCode' => 'P003',
                    'Description' => 'Domain example.com'
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'invoice' => ['Identifier' => '6', 'InvoiceCode' => '[concept]0002', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '0', 'SubStatus' => '', 'Date' => '2019-05-17', 'Term' => '14', 'PayBefore' => '2019-05-31', 'PaymentURL' => '', 'AmountExcl' => '165.00', 'AmountTax' => '34.65', 'AmountIncl' => '199.65', 'TaxRate' => '0', 'Compound' => 'no', 'AmountPaid' => '0.00', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'ScheduledAt' => '', 'SentDate' => '', 'Sent' => '0', 'Reminders' => '0', 'ReminderDate' => '', 'Summations' => '0', 'SummationDate' => '', 'Authorisation' => 'no', 'PaymentMethod' => '', 'PayDate' => '', 'TransactionID' => '', 'Description' => '', 'Comment' => '', 'InvoiceLines' => [0 => ['Identifier' => '113', 'Date' => '2019-05-17', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '0', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '114', 'Date' => '2019-05-17', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '12', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2019-05-17', 'EndPeriod' => '2020-05-17', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Status' => 'Concept', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => ''], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $invoice);
    }

    /** @test */
    public function it_can_add_a_new_invoice_line_to_an_existing_invoice()
    {
        $this->markTestIncomplete('Missing ApiClient Response ..');

        $invoice = $this->hostFact->invoices()->line()->add([
            'InvoiceCode' => 'F0001',
            'InvoiceLines' => [
                [
                    'Description' => 'Additional fee',
                    'PriceExcl' => 50
                ]
            ]
        ]);
    }

    /** @test */
    public function it_can_add_an_attachement_to_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de crediteur"]}')
        );

        $invoice = $this->hostFact->invoices()->attachments()->add([
            'InvoiceCode' => 'F0001',
            'Type' => 'invoice',
            'Filename' => 'sample.pdf',
            'Base64' => 'JVBERi0xLj...UlRU9GDQ=='
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de crediteur']], $invoice);
    }

    /** @test */
    public function it_can_block_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"block","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Factuur [concept]0001 is geblokkeerd."]}')
        );

        $invoice = $this->hostFact->invoices()->block([
            'InvoiceCode' => '[concept]0001'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'block', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Factuur [concept]0001 is geblokkeerd.']], $invoice);
    }

    /** @test */
    public function it_can_cancel_schedule_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"cancelschedule","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Factuur [concept]0001 is niet langer ingepland."]}')
        );

        $invoice = $this->hostFact->invoices()->cancelSchedule([
            'Identifier' => '1',
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'cancelschedule', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Factuur [concept]0001 is niet langer ingepland.']], $invoice);
    }

    /** @test */
    public function it_can_credit_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"credit","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Factuur F0001 is gecrediteerd en op status \'vervallen\' gezet","Factuur F0004 is succesvol aangemaakt"],"invoice":{"Identifier":"6","InvoiceCode":"F0004","Debtor":"1","DebtorCode":"DB0001","Status":"8","SubStatus":"","Date":"2019-05-17","Term":"14","PayBefore":"2019-05-31","PaymentURL":"","AmountExcl":"-165.00","AmountTax":"-34.65","AmountIncl":"-199.65","TaxRate":"0","Compound":"no","AmountPaid":"0.00","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"5","SentDate":"","Sent":"0","Reminders":"0","ReminderDate":"","Summations":"0","SummationDate":"","Authorisation":"no","PaymentMethod":"","PayDate":"","TransactionID":"","Description":"","Comment":"","InvoiceLines":[{"Identifier":"113","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"-150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"0","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"-181.5","NoDiscountAmountExcl":"-150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"114","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"-15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"7","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","ProductType":"","Reference":"0","NoDiscountAmountIncl":"-18.15","NoDiscountAmountExcl":"-15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"115","Date":"2019-05-17","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Corresponderende factuur: F0001","PriceExcl":"0","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"0","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"0","NoDiscountAmountExcl":"0","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Status":"Creditfactuur","Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Creditfactuur","PaymentMethod":""},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"-165","AmountTax":"-34.65","AmountIncl":"-199.65"}}}}')
        );

        $invoice = $this->hostFact->invoices()->credit([
            'InvoiceCode' => 'F0001'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'credit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Factuur F0001 is gecrediteerd en op status \'vervallen\' gezet', 1 => 'Factuur F0004 is succesvol aangemaakt'], 'invoice' => ['Identifier' => '6', 'InvoiceCode' => 'F0004', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '8', 'SubStatus' => '', 'Date' => '2019-05-17', 'Term' => '14', 'PayBefore' => '2019-05-31', 'PaymentURL' => '', 'AmountExcl' => '-165.00', 'AmountTax' => '-34.65', 'AmountIncl' => '-199.65', 'TaxRate' => '0', 'Compound' => 'no', 'AmountPaid' => '0.00', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '5', 'SentDate' => '', 'Sent' => '0', 'Reminders' => '0', 'ReminderDate' => '', 'Summations' => '0', 'SummationDate' => '', 'Authorisation' => 'no', 'PaymentMethod' => '', 'PayDate' => '', 'TransactionID' => '', 'Description' => '', 'Comment' => '', 'InvoiceLines' => [0 => ['Identifier' => '113', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '-150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '0', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '-181.5', 'NoDiscountAmountExcl' => '-150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '114', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '-15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '7', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '-18.15', 'NoDiscountAmountExcl' => '-15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 2 => ['Identifier' => '115', 'Date' => '2019-05-17', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Corresponderende factuur: F0001', 'PriceExcl' => '0', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '0', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '0', 'NoDiscountAmountExcl' => '0', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Status' => 'Creditfactuur', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Creditfactuur', 'PaymentMethod' => ''], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '-165', 'AmountTax' => '-34.65', 'AmountIncl' => '-199.65']]]], $invoice);
    }

    /** @test */
    public function it_can_delete_an_attachement_of_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De bijlage \'sample.pdf\' is verwijderd"]}')
        );

        $invoice = $this->hostFact->invoices()->attachments()->delete([
            'InvoiceCode' => 'F0001',
            'Type' => 'invoice',
            'Filename' => 'sample.pdf'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De bijlage \'sample.pdf\' is verwijderd']], $invoice);
    }

    /** @test */
    public function it_can_delete_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Factuur [concept]0001 is verwijderd"]}')
        );

        $invoice = $this->hostFact->invoices()->delete([
            'Identifier' => '1'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Factuur [concept]0001 is verwijderd']], $invoice);
    }

    /** @test */
    public function it_can_delete_an_invoice_line_of_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoiceline","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Er zijn 1 factuurregels verwijderd"],"invoice":{"Identifier":"2","InvoiceCode":"F0001","Debtor":"1","DebtorCode":"DB0001","Status":"2","SubStatus":"","Date":"2018-01-11","Term":"14","PayBefore":"2018-01-25","PaymentURL":"http://company.com/klantenpaneel/betalen/?payment=F0001&key=cd97244a5420777c6802ff983c8a8081","AmountExcl":"15.00","AmountTax":"3.15","AmountIncl":"18.15","TaxRate":"0","Compound":"no","AmountPaid":"0.00","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","SentDate":"","Sent":"0","Reminders":"0","ReminderDate":"","Summations":"0","SummationDate":"","Authorisation":"no","PaymentMethod":"","PayDate":"","TransactionID":"","Description":"","Comment":"","InvoiceLines":[{"Identifier":"4","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"7","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","ProductType":"","Reference":"0","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Attachments":[{"Identifier":"4","Filename":"sample.pdf"}],"Translations":{"Status":"Verzonden","Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":""},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"15","AmountTax":"3.15","AmountIncl":"18.15"}}}}')
        );

        $invoice = $this->hostFact->invoices()->line()->delete([
            'InvoiceCode' => 'F0001',
            'InvoiceLines' => [
                [
                    'Identifier' => 3
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'invoiceline', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Er zijn 1 factuurregels verwijderd'], 'invoice' => ['Identifier' => '2', 'InvoiceCode' => 'F0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '2', 'SubStatus' => '', 'Date' => '2018-01-11', 'Term' => '14', 'PayBefore' => '2018-01-25', 'PaymentURL' => 'http://company.com/klantenpaneel/betalen/?payment=F0001&key=cd97244a5420777c6802ff983c8a8081', 'AmountExcl' => '15.00', 'AmountTax' => '3.15', 'AmountIncl' => '18.15', 'TaxRate' => '0', 'Compound' => 'no', 'AmountPaid' => '0.00', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'SentDate' => '', 'Sent' => '0', 'Reminders' => '0', 'ReminderDate' => '', 'Summations' => '0', 'SummationDate' => '', 'Authorisation' => 'no', 'PaymentMethod' => '', 'PayDate' => '', 'TransactionID' => '', 'Description' => '', 'Comment' => '', 'InvoiceLines' => [0 => ['Identifier' => '4', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '7', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Attachments' => [0 => ['Identifier' => '4', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Verzonden', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => ''], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '15', 'AmountTax' => '3.15', 'AmountIncl' => '18.15']]]], $invoice);
    }

    /** @test */
    public function it_can_do_a_part_payment_of_an_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"partpayment","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Deelbetaling bij factuur F0001 is verwerkt"],"invoice":{"Identifier":"2","InvoiceCode":"F0001","Debtor":"1","DebtorCode":"DB0001","Status":"3","SubStatus":"","Date":"2018-01-11","Term":"14","PayBefore":"2018-01-25","PaymentURL":"http://company.com/klantenpaneel/betalen/?payment=F0001&key=a98a856c384112268c1495d806ceea82","AmountExcl":"165.00","AmountTax":"34.65","AmountIncl":"199.65","TaxRate":"0","Compound":"no","AmountPaid":"5.25","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","SentDate":"","Sent":"0","Reminders":"0","ReminderDate":"","Summations":"0","SummationDate":"","Authorisation":"no","PaymentMethod":"","PayDate":"","TransactionID":"","Description":"","Comment":"","InvoiceLines":[{"Identifier":"3","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"0","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"4","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"7","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","ProductType":"","Reference":"0","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Attachments":[{"Identifier":"4","Filename":"sample.pdf"}],"Translations":{"Status":"Deels betaald","Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":""},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $invoice = $this->hostFact->invoices()->partPayment([
            'Identifier' => 2,
            'AmountPaid' => 5.25
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'partpayment', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Deelbetaling bij factuur F0001 is verwerkt'], 'invoice' => ['Identifier' => '2', 'InvoiceCode' => 'F0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '3', 'SubStatus' => '', 'Date' => '2018-01-11', 'Term' => '14', 'PayBefore' => '2018-01-25', 'PaymentURL' => 'http://company.com/klantenpaneel/betalen/?payment=F0001&key=a98a856c384112268c1495d806ceea82', 'AmountExcl' => '165.00', 'AmountTax' => '34.65', 'AmountIncl' => '199.65', 'TaxRate' => '0', 'Compound' => 'no', 'AmountPaid' => '5.25', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'SentDate' => '', 'Sent' => '0', 'Reminders' => '0', 'ReminderDate' => '', 'Summations' => '0', 'SummationDate' => '', 'Authorisation' => 'no', 'PaymentMethod' => '', 'PayDate' => '', 'TransactionID' => '', 'Description' => '', 'Comment' => '', 'InvoiceLines' => [0 => ['Identifier' => '3', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '0', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '4', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '7', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Attachments' => [0 => ['Identifier' => '4', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Deels betaald', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => ''], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $invoice);
    }

    /** @test */
    public function it_can_download_an_attachement_of_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"download","status":"success","date":"2019-05-20T12:00:00+02:00","success":["sample.pdf","JVBERi0xLj...olJUVPRg=="]}')
        );

        $invoice = $this->hostFact->invoices()->attachments()->download([
            'InvoiceCode' => 'F0001',
            'Type' => 'invoice',
            'Filename' => 'sample.pdf'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'download', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'sample.pdf', 1 => 'JVBERi0xLj...olJUVPRg==']], $invoice);
    }

    /** @test */
    public function it_can_download_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"download","status":"success","date":"2019-05-20T12:00:00+02:00","invoice":{"Filename":"Factuur_F0001.pdf","Base64":"JVBERi0xLj...AKJSVFT0YK"}}')
        );

        $invoice = $this->hostFact->invoices()->download([
            'InvoiceCode' => 'F0001'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'download', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'invoice' => ['Filename' => 'Factuur_F0001.pdf', 'Base64' => 'JVBERi0xLj...AKJSVFT0YK']], $invoice);
    }

    /** @test */
    public function it_can_edit_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","invoice":{"Identifier":"1","InvoiceCode":"[concept]0001","Debtor":"1","DebtorCode":"DB0001","Status":"0","SubStatus":"","Date":"2018-01-14","Term":"14","PayBefore":"2018-01-28","PaymentURL":"","AmountExcl":"20.00","AmountTax":"4.20","AmountIncl":"24.20","TaxRate":"0","Compound":"no","AmountPaid":"0.00","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","ScheduledAt":"","SentDate":"","Sent":"0","Reminders":"0","ReminderDate":"","Summations":"0","SummationDate":"","Authorisation":"no","PaymentMethod":"","PayDate":"","TransactionID":"","Description":"","Comment":"","InvoiceLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"20","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"0","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"24.2","NoDiscountAmountExcl":"20","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Status":"Concept","Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":""},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"20","AmountTax":"4.2","AmountIncl":"24.2"}}}}')
        );

        $invoice = $this->hostFact->invoices()->edit([
            'Identifier' => '1',
            'InvoiceLines' => [
                [
                    'Identifier' => 1,
                    'PriceExcl' => 20,
                    'Periods' => 1,
                    'Periodic' => 'm'
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'invoice' => ['Identifier' => '1', 'InvoiceCode' => '[concept]0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '0', 'SubStatus' => '', 'Date' => '2018-01-14', 'Term' => '14', 'PayBefore' => '2018-01-28', 'PaymentURL' => '', 'AmountExcl' => '20.00', 'AmountTax' => '4.20', 'AmountIncl' => '24.20', 'TaxRate' => '0', 'Compound' => 'no', 'AmountPaid' => '0.00', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'ScheduledAt' => '', 'SentDate' => '', 'Sent' => '0', 'Reminders' => '0', 'ReminderDate' => '', 'Summations' => '0', 'SummationDate' => '', 'Authorisation' => 'no', 'PaymentMethod' => '', 'PayDate' => '', 'TransactionID' => '', 'Description' => '', 'Comment' => '', 'InvoiceLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '20', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '0', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '24.2', 'NoDiscountAmountExcl' => '20', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Status' => 'Concept', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => ''], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '20', 'AmountTax' => '4.2', 'AmountIncl' => '24.2']]]], $invoice);
    }

    /** @test */
    public function it_can_get_all_the_invoices()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"5","currentresults":"5","offset":"0","invoices":[{"Identifier":"1","InvoiceCode":"[concept]0001","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","AmountExcl":"150.00","AmountIncl":"181.50","AmountOpen":"0","Date":"2018-01-14","Status":"0","SubStatus":"","Authorisation":"no","Modified":"2019-05-20 12:00:00"},{"Identifier":"4","InvoiceCode":"F0003","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","AmountExcl":"10.00","AmountIncl":"12.10","AmountOpen":"0","Date":"2018-01-14","Status":"4","SubStatus":"","Authorisation":"no","Modified":"2019-05-20 12:00:00"},{"Identifier":"3","InvoiceCode":"F0002","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","AmountExcl":"500.00","AmountIncl":"605.00","AmountOpen":"605.00","Date":"2018-01-14","Status":"2","SubStatus":"PAUSED","Authorisation":"no","Modified":"2019-05-20 12:00:00"},{"Identifier":"2","InvoiceCode":"F0001","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","AmountExcl":"165.00","AmountIncl":"199.65","AmountOpen":"199.65","Date":"2018-01-11","Status":"2","SubStatus":"","Authorisation":"no","Modified":"2019-05-20 12:00:00"},{"Identifier":"5","InvoiceCode":"F0000","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","AmountExcl":"10.00","AmountIncl":"12.10","AmountOpen":"12.10","Date":"2018-01-01","Status":"2","SubStatus":"","Authorisation":"no","Modified":"2019-05-20 12:00:00"}]}')
        );

        $invoices = $this->hostFact->invoices()->list([
            // 'searchat' => 'Date',
            // 'searchfor' => '2014-05-13'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '5', 'currentresults' => '5', 'offset' => '0', 'invoices' => [0 => ['Identifier' => '1', 'InvoiceCode' => '[concept]0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'AmountExcl' => '150.00', 'AmountIncl' => '181.50', 'AmountOpen' => '0', 'Date' => '2018-01-14', 'Status' => '0', 'SubStatus' => '', 'Authorisation' => 'no', 'Modified' => '2019-05-20 12:00:00'], 1 => ['Identifier' => '4', 'InvoiceCode' => 'F0003', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'AmountExcl' => '10.00', 'AmountIncl' => '12.10', 'AmountOpen' => '0', 'Date' => '2018-01-14', 'Status' => '4', 'SubStatus' => '', 'Authorisation' => 'no', 'Modified' => '2019-05-20 12:00:00'], 2 => ['Identifier' => '3', 'InvoiceCode' => 'F0002', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'AmountExcl' => '500.00', 'AmountIncl' => '605.00', 'AmountOpen' => '605.00', 'Date' => '2018-01-14', 'Status' => '2', 'SubStatus' => 'PAUSED', 'Authorisation' => 'no', 'Modified' => '2019-05-20 12:00:00'], 3 => ['Identifier' => '2', 'InvoiceCode' => 'F0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'AmountExcl' => '165.00', 'AmountIncl' => '199.65', 'AmountOpen' => '199.65', 'Date' => '2018-01-11', 'Status' => '2', 'SubStatus' => '', 'Authorisation' => 'no', 'Modified' => '2019-05-20 12:00:00'], 4 => ['Identifier' => '5', 'InvoiceCode' => 'F0000', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'AmountExcl' => '10.00', 'AmountIncl' => '12.10', 'AmountOpen' => '12.10', 'Date' => '2018-01-01', 'Status' => '2', 'SubStatus' => '', 'Authorisation' => 'no', 'Modified' => '2019-05-20 12:00:00']]], $invoices);
    }

    /** @test */
    public function it_can_mark_an_invoice_as_paid()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"markaspaid","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Factuur F0001 is betaald."]}')
        );

        $invoice = $this->hostFact->invoices()->markAsPaid([
            'InvoiceCode' => 'F0001'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'markaspaid', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Factuur F0001 is betaald.']], $invoice);
    }

    /** @test */
    public function it_can_mark_an_invoice_as_unpaid()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"markasunpaid","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Betaling van factuur F0003 is teruggedraaid"]}')
        );

        $invoice = $this->hostFact->invoices()->markAsUnpaid([
            'InvoiceCode' => 'F0003'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'markasunpaid', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Betaling van factuur F0003 is teruggedraaid']], $invoice);
    }

    /** @test */
    public function it_can_payment_process_pause_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"paymentprocesspause","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Betalingstraject voor factuur F0001 is gepauzeerd"]}')
        );

        $invoice = $this->hostFact->invoices()->paymentProcessPause([
            'InvoiceCode' => 'F0001'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'paymentprocesspause', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Betalingstraject voor factuur F0001 is gepauzeerd']], $invoice);
    }

    /** @test */
    public function it_can_payment_process_reactive_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"paymentprocessreactivate","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Betalingstraject voor factuur F0002 is geactiveerd"]}')
        );

        $invoice = $this->hostFact->invoices()->paymentProcessReactivate([
            'InvoiceCode' => 'F0002'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'paymentprocessreactivate', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Betalingstraject voor factuur F0002 is geactiveerd']], $invoice);
    }

    /** @test */
    public function it_can_schedule_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"schedule","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Factuur [concept]0001 is ingepland op 01-01-2018 om 12:00."]}')
        );

        $invoice = $this->hostFact->invoices()->schedule([
            'Identifier' => '1',
            'ScheduledAt' => '2018-01-01 12:00:00'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'schedule', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Factuur [concept]0001 is ingepland op 01-01-2018 om 12:00.']], $invoice);
    }

    /** @test */
    public function it_can_send_by_email_the_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"sendbyemail","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Factuur F0001 is per e-mail verzonden naar info@company.com"],"invoice":{"Identifier":"2","InvoiceCode":"F0001","Debtor":"1","DebtorCode":"DB0001","Status":"2","SubStatus":"","Date":"2018-01-11","Term":"14","PayBefore":"2018-01-25","PaymentURL":"http://company.com/klantenpaneel/betalen/?payment=F0001&key=a98a856c384112268c1495d806ceea82","AmountExcl":"165.00","AmountTax":"34,65","AmountIncl":"199.65","TaxRate":"0","Compound":"no","AmountPaid":"0.00","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","SentDate":"2019-05-17","Sent":"1","Reminders":"0","ReminderDate":"","Summations":"0","SummationDate":"","Authorisation":"no","PaymentMethod":"","PayDate":"","TransactionID":"","Description":"","Comment":"","InvoiceLines":[{"Identifier":"3","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"0","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"4","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"7","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","ProductType":"","Reference":"0","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Attachments":[{"Identifier":"4","Filename":"sample.pdf"}],"Translations":{"Status":"Verzonden","Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":""},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $invoice = $this->hostFact->invoices()->sendByEmail([
            'InvoiceCode' => 'F0001'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'sendbyemail', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Factuur F0001 is per e-mail verzonden naar info@company.com'], 'invoice' => ['Identifier' => '2', 'InvoiceCode' => 'F0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '2', 'SubStatus' => '', 'Date' => '2018-01-11', 'Term' => '14', 'PayBefore' => '2018-01-25', 'PaymentURL' => 'http://company.com/klantenpaneel/betalen/?payment=F0001&key=a98a856c384112268c1495d806ceea82', 'AmountExcl' => '165.00', 'AmountTax' => '34,65', 'AmountIncl' => '199.65', 'TaxRate' => '0', 'Compound' => 'no', 'AmountPaid' => '0.00', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'SentDate' => '2019-05-17', 'Sent' => '1', 'Reminders' => '0', 'ReminderDate' => '', 'Summations' => '0', 'SummationDate' => '', 'Authorisation' => 'no', 'PaymentMethod' => '', 'PayDate' => '', 'TransactionID' => '', 'Description' => '', 'Comment' => '', 'InvoiceLines' => [0 => ['Identifier' => '3', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '0', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '4', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '7', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Attachments' => [0 => ['Identifier' => '4', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Verzonden', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => ''], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $invoice);
    }

    /** @test */
    public function it_can_send_reminder_email_for_the_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"sendreminderbyemail","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De herinnering voor factuur F0001 is succesvol verzonden per e-mail naar info@company.com"]}')
        );

        $invoice = $this->hostFact->invoices()->sendReminderByEmail([
            'InvoiceCode' => 'F0001'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'sendreminderbyemail', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De herinnering voor factuur F0001 is succesvol verzonden per e-mail naar info@company.com']], $invoice);
    }

    /** @test */
    public function it_can_send_summation_email_for_the_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"sendsummationbyemail","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De aanmaning voor factuur F0000 is succesvol verzonden per e-mail naar info@company.com"]}')
        );

        $invoice = $this->hostFact->invoices()->sendSummationByEmail([
            'InvoiceCode' => 'F0000'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'sendsummationbyemail', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De aanmaning voor factuur F0000 is succesvol verzonden per e-mail naar info@company.com']], $invoice);
    }

    /** @test */
    public function it_can_show_an_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","invoice":{"Identifier":"2","InvoiceCode":"F0001","Debtor":"1","DebtorCode":"DB0001","Status":"2","SubStatus":"","Date":"2018-01-11","Term":"14","PayBefore":"2018-01-25","PaymentURL":"http://company.com/klantenpaneel/betalen/?payment=F0001&key=a98a856c384112268c1495d806ceea82","AmountExcl":"165.00","AmountTax":"34.65","AmountIncl":"199.65","TaxRate":"0","Compound":"no","AmountPaid":"0.00","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","SentDate":"","Sent":"0","Reminders":"0","ReminderDate":"","Summations":"0","SummationDate":"","Authorisation":"no","PaymentMethod":"","PayDate":"","TransactionID":"","Description":"","Comment":"","InvoiceLines":[{"Identifier":"3","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"0","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"4","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","PeriodicID":"7","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","ProductType":"","Reference":"0","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Attachments":[{"Identifier":"4","Filename":"sample.pdf"}],"Translations":{"Status":"Verzonden","Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":""},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $invoice = $this->hostFact->invoices()->show([
            'InvoiceCode' => 'F0001'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'invoice' => ['Identifier' => '2', 'InvoiceCode' => 'F0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '2', 'SubStatus' => '', 'Date' => '2018-01-11', 'Term' => '14', 'PayBefore' => '2018-01-25', 'PaymentURL' => 'http://company.com/klantenpaneel/betalen/?payment=F0001&key=a98a856c384112268c1495d806ceea82', 'AmountExcl' => '165.00', 'AmountTax' => '34.65', 'AmountIncl' => '199.65', 'TaxRate' => '0', 'Compound' => 'no', 'AmountPaid' => '0.00', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'SentDate' => '', 'Sent' => '0', 'Reminders' => '0', 'ReminderDate' => '', 'Summations' => '0', 'SummationDate' => '', 'Authorisation' => 'no', 'PaymentMethod' => '', 'PayDate' => '', 'TransactionID' => '', 'Description' => '', 'Comment' => '', 'InvoiceLines' => [0 => ['Identifier' => '3', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '0', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '4', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'PeriodicID' => '7', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Attachments' => [0 => ['Identifier' => '4', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Verzonden', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => ''], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $invoice);
    }

    /** @test */
    public function it_can_unblock_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"invoice","action":"unblock","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De blokkade van conceptfactuur [concept]0001 is opgeheven."]}')
        );

        $invoice = $this->hostFact->invoices()->unblock([
            'InvoiceCode' => '[concept]0001'
        ]);

        $this->assertSame(['controller' => 'invoice', 'action' => 'unblock', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De blokkade van conceptfactuur [concept]0001 is opgeheven.']], $invoice);
    }
}
