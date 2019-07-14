<?php

namespace nickurt\HostFact\Tests\Endpoints;

class PriceQuotesTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_accept_an_existing_price_quotes()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequote","action":"accept","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Offerte OF0001 is succesvol bewerkt"],"pricequote":{"Identifier":"1","PriceQuoteCode":"OF0001","Debtor":"1","DebtorCode":"DB0001","Status":"3","Date":"2018-01-14","Term":"30","ExpirationDate":"2018-02-13 00:00:00","AmountExcl":"165.00","AmountTax":"34.65","AmountIncl":"199.65","TaxRate":"0","Compound":"no","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PriceQuoteMethod":"0","Template":"2","SentDate":"","Sent":"0","Description":"","Comment":"","PriceQuoteLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"2","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","AcceptURL":"","Attachments":[{"Identifier":"5","Filename":"sample.pdf"}],"Translations":{"Status":"Geaccepteerd","Country":"Nederland","PriceQuoteMethod":"Per e-mail","Template":"Offerte"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $price = $this->hostFact->pricequotes()->accept([
            'PriceQuoteCode' => 'OF0001'
        ]);

        $this->assertSame(['controller' => 'pricequote', 'action' => 'accept', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Offerte OF0001 is succesvol bewerkt'], 'pricequote' => ['Identifier' => '1', 'PriceQuoteCode' => 'OF0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '3', 'Date' => '2018-01-14', 'Term' => '30', 'ExpirationDate' => '2018-02-13 00:00:00', 'AmountExcl' => '165.00', 'AmountTax' => '34.65', 'AmountIncl' => '199.65', 'TaxRate' => '0', 'Compound' => 'no', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PriceQuoteMethod' => '0', 'Template' => '2', 'SentDate' => '', 'Sent' => '0', 'Description' => '', 'Comment' => '', 'PriceQuoteLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '2', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'AcceptURL' => '', 'Attachments' => [0 => ['Identifier' => '5', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Geaccepteerd', 'Country' => 'Nederland', 'PriceQuoteMethod' => 'Per e-mail', 'Template' => 'Offerte'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $price);
    }

    /** @test */
    public function it_can_add_a_new_quote_line_to_an_existing_quote()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequoteline","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Er zijn 1 offerteregels toegevoegd"],"pricequote":{"Identifier":"1","PriceQuoteCode":"OF0001","Debtor":"1","DebtorCode":"DB0001","Status":"0","Date":"2018-01-14","Term":"30","ExpirationDate":"2018-02-13 00:00:00","AmountExcl":"215.00","AmountTax":"45.15","AmountIncl":"260.15","TaxRate":"0","Compound":"no","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PriceQuoteMethod":"0","Template":"2","SentDate":"","Sent":"0","Description":"","Comment":"","PriceQuoteLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"2","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"3","Date":"2019-05-17","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Additional fee","PriceExcl":"50","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","NoDiscountAmountIncl":"60.5","NoDiscountAmountExcl":"50","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","AcceptURL":"","Attachments":[{"Identifier":"5","Filename":"sample.pdf"}],"Translations":{"Status":"Concept","Country":"Nederland","PriceQuoteMethod":"Per e-mail","Template":"Offerte"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"215","AmountTax":"45.15","AmountIncl":"260.15"}}}}')
        );

        $price = $this->hostFact->pricequotes()->line()->add([
            'PriceQuoteCode' => 'OF0001',
            'PriceQuoteLines' => [
                [
                    'Description' => 'Additional fee',
                    'PriceExcl' => 50
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'pricequoteline', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Er zijn 1 offerteregels toegevoegd'], 'pricequote' => ['Identifier' => '1', 'PriceQuoteCode' => 'OF0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '0', 'Date' => '2018-01-14', 'Term' => '30', 'ExpirationDate' => '2018-02-13 00:00:00', 'AmountExcl' => '215.00', 'AmountTax' => '45.15', 'AmountIncl' => '260.15', 'TaxRate' => '0', 'Compound' => 'no', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PriceQuoteMethod' => '0', 'Template' => '2', 'SentDate' => '', 'Sent' => '0', 'Description' => '', 'Comment' => '', 'PriceQuoteLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '2', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 2 => ['Identifier' => '3', 'Date' => '2019-05-17', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Additional fee', 'PriceExcl' => '50', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'NoDiscountAmountIncl' => '60.5', 'NoDiscountAmountExcl' => '50', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'AcceptURL' => '', 'Attachments' => [0 => ['Identifier' => '5', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Concept', 'Country' => 'Nederland', 'PriceQuoteMethod' => 'Per e-mail', 'Template' => 'Offerte'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '215', 'AmountTax' => '45.15', 'AmountIncl' => '260.15']]]], $price);
    }

    /** @test */
    public function it_can_add_an_attachement_to_an_existing_quote()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de crediteur"]}')
        );

        $price = $this->hostFact->pricequotes()->attachments()->add([
            'PriceQuoteCode' => 'OF0001',
            'Type' => 'pricequote',
            'Filename' => 'sample.pdf',
            'Base64' => 'JVBERi0xLj...UlRU9GDQ=='
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de crediteur']], $price);
    }

    /** @test */
    public function it_can_create_a_new_price_quotes()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequote","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","pricequote":{"Identifier":"2","PriceQuoteCode":"OF0002","Debtor":"1","DebtorCode":"DB0001","Status":"0","Date":"2019-05-17","Term":"30","ExpirationDate":"2019-06-16 00:00:00","AmountExcl":"165.00","AmountTax":"34.65","AmountIncl":"199.65","TaxRate":"0","Compound":"no","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PriceQuoteMethod":"0","Template":"2","SentDate":"","Sent":"0","Description":"","Comment":"","PriceQuoteLines":[{"Identifier":"3","Date":"2019-05-17","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"4","Date":"2019-05-17","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"j","StartPeriod":"2019-05-17","EndPeriod":"2020-05-17","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","AcceptURL":"","Translations":{"Status":"Concept","Country":"Nederland","PriceQuoteMethod":"Per e-mail","Template":"Offerte"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $price = $this->hostFact->pricequotes()->add([
            'DebtorCode' => 'DB0001',
            'PriceQuoteLines' => [
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

        $this->assertSame(['controller' => 'pricequote', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'pricequote' => ['Identifier' => '2', 'PriceQuoteCode' => 'OF0002', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '0', 'Date' => '2019-05-17', 'Term' => '30', 'ExpirationDate' => '2019-06-16 00:00:00', 'AmountExcl' => '165.00', 'AmountTax' => '34.65', 'AmountIncl' => '199.65', 'TaxRate' => '0', 'Compound' => 'no', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PriceQuoteMethod' => '0', 'Template' => '2', 'SentDate' => '', 'Sent' => '0', 'Description' => '', 'Comment' => '', 'PriceQuoteLines' => [0 => ['Identifier' => '3', 'Date' => '2019-05-17', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '4', 'Date' => '2019-05-17', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2019-05-17', 'EndPeriod' => '2020-05-17', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'AcceptURL' => '', 'Translations' => ['Status' => 'Concept', 'Country' => 'Nederland', 'PriceQuoteMethod' => 'Per e-mail', 'Template' => 'Offerte'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $price);
    }

    /** @test */
    public function it_can_decline_an_existing_price_quotes()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequote","action":"decline","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Offerte OF0001 is succesvol bewerkt"],"pricequote":{"Identifier":"1","PriceQuoteCode":"OF0001","Debtor":"1","DebtorCode":"DB0001","Status":"8","Date":"2018-01-14","Term":"30","ExpirationDate":"2018-02-13 00:00:00","AmountExcl":"165.00","AmountTax":"34.65","AmountIncl":"199.65","TaxRate":"0","Compound":"no","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PriceQuoteMethod":"0","Template":"2","SentDate":"","Sent":"0","Description":"","Comment":"","PriceQuoteLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"2","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","AcceptURL":"","Attachments":[{"Identifier":"5","Filename":"sample.pdf"}],"Translations":{"Status":"Niet geaccepteerd","Country":"Nederland","PriceQuoteMethod":"Per e-mail","Template":"Offerte"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $price = $this->hostFact->pricequotes()->decline([
            'PriceQuoteCode' => 'OF0001'
        ]);

        $this->assertSame(['controller' => 'pricequote', 'action' => 'decline', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Offerte OF0001 is succesvol bewerkt'], 'pricequote' => ['Identifier' => '1', 'PriceQuoteCode' => 'OF0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '8', 'Date' => '2018-01-14', 'Term' => '30', 'ExpirationDate' => '2018-02-13 00:00:00', 'AmountExcl' => '165.00', 'AmountTax' => '34.65', 'AmountIncl' => '199.65', 'TaxRate' => '0', 'Compound' => 'no', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PriceQuoteMethod' => '0', 'Template' => '2', 'SentDate' => '', 'Sent' => '0', 'Description' => '', 'Comment' => '', 'PriceQuoteLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '2', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'AcceptURL' => '', 'Attachments' => [0 => ['Identifier' => '5', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Niet geaccepteerd', 'Country' => 'Nederland', 'PriceQuoteMethod' => 'Per e-mail', 'Template' => 'Offerte'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $price);
    }

    /** @test */
    public function it_can_delete_an_attachement_of_an_existing_quote()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De bijlage \'sample.pdf\' is verwijderd"]}')
        );

        $price = $this->hostFact->pricequotes()->attachments()->delete([
            'PriceQuoteCode' => 'OF0001',
            'Type' => 'pricequote',
            'Filename' => 'sample.pdf'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De bijlage \'sample.pdf\' is verwijderd']], $price);
    }

    /** @test */
    public function it_can_delete_an_existing_price_quotes()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequote","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Offerte OF0001 is volledig verwijderd"]}')
        );

        $price = $this->hostFact->pricequotes()->delete([
            'PriceQuoteCode' => 'OF0001',
            'DeleteType' => 'remove'
        ]);

        $this->assertSame(['controller' => 'pricequote', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Offerte OF0001 is volledig verwijderd']], $price);
    }

    /** @test */
    public function it_can_delete_an_quote_line_of_an_existing_quote()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequoteline","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Er zijn 1 offerteregels verwijderd"],"pricequote":{"Identifier":"1","PriceQuoteCode":"OF0001","Debtor":"1","DebtorCode":"DB0001","Status":"0","Date":"2018-01-14","Term":"30","ExpirationDate":"2018-02-13 00:00:00","AmountExcl":"150.00","AmountTax":"31.50","AmountIncl":"181.50","TaxRate":"0","Compound":"no","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PriceQuoteMethod":"0","Template":"2","SentDate":"","Sent":"0","Description":"","Comment":"","PriceQuoteLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","AcceptURL":"","Attachments":[{"Identifier":"5","Filename":"sample.pdf"}],"Translations":{"Status":"Concept","Country":"Nederland","PriceQuoteMethod":"Per e-mail","Template":"Offerte"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"150","AmountTax":"31.5","AmountIncl":"181.5"}}}}')
        );

        $price = $this->hostFact->pricequotes()->line()->delete([
            'PriceQuoteCode' => 'OF0001',
            'PriceQuoteLines' => [
                [
                    'Identifier' => 2
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'pricequoteline', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Er zijn 1 offerteregels verwijderd'], 'pricequote' => ['Identifier' => '1', 'PriceQuoteCode' => 'OF0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '0', 'Date' => '2018-01-14', 'Term' => '30', 'ExpirationDate' => '2018-02-13 00:00:00', 'AmountExcl' => '150.00', 'AmountTax' => '31.50', 'AmountIncl' => '181.50', 'TaxRate' => '0', 'Compound' => 'no', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PriceQuoteMethod' => '0', 'Template' => '2', 'SentDate' => '', 'Sent' => '0', 'Description' => '', 'Comment' => '', 'PriceQuoteLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'AcceptURL' => '', 'Attachments' => [0 => ['Identifier' => '5', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Concept', 'Country' => 'Nederland', 'PriceQuoteMethod' => 'Per e-mail', 'Template' => 'Offerte'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '150', 'AmountTax' => '31.5', 'AmountIncl' => '181.5']]]], $price);
    }

    /** @test */
    public function it_can_download_an_attachement_of_an_existing_invoice()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"download","status":"success","date":"2019-05-20T12:00:00+02:00","success":["sample.pdf","JVBERi0xLj...olJUVPRg=="]}')
        );

        $price = $this->hostFact->pricequotes()->attachments()->download([
            'PriceQuoteCode' => 'OF0001',
            'Type' => 'pricequote',
            'Filename' => 'sample.pdf'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'download', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'sample.pdf', 1 => 'JVBERi0xLj...olJUVPRg==']], $price);
    }

    /** @test */
    public function it_can_download_an_existing_price_quotes()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequote","action":"download","status":"success","date":"2019-05-20T12:00:00+02:00","pricequote":{"Filename":"Offerte_OF0001.pdf","Base64":"JVBERi0xLj...UlRU9GCg=="}}')
        );

        $price = $this->hostFact->pricequotes()->download([
            'PriceQuoteCode' => 'OF0001'
        ]);

        $this->assertSame(['controller' => 'pricequote', 'action' => 'download', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'pricequote' => ['Filename' => 'Offerte_OF0001.pdf', 'Base64' => 'JVBERi0xLj...UlRU9GCg==']], $price);
    }

    /** @test */
    public function it_can_edit_an_existing_price_quotes()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequote","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","pricequote":{"Identifier":"1","PriceQuoteCode":"OF0001","Debtor":"1","DebtorCode":"DB0001","Status":"0","Date":"2018-01-14","Term":"30","ExpirationDate":"2018-02-13 00:00:00","AmountExcl":"170.00","AmountTax":"35.70","AmountIncl":"205.70","TaxRate":"0","Compound":"no","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PriceQuoteMethod":"0","Template":"2","SentDate":"","Sent":"0","Description":"","Comment":"","PriceQuoteLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"2","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"20","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"m","StartPeriod":"2018-01-14","EndPeriod":"2018-02-14","NoDiscountAmountIncl":"24.2","NoDiscountAmountExcl":"20","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","AcceptURL":"","Attachments":[{"Identifier":"5","Filename":"sample.pdf"}],"Translations":{"Status":"Concept","Country":"Nederland","PriceQuoteMethod":"Per e-mail","Template":"Offerte"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"170","AmountTax":"35.7","AmountIncl":"205.7"}}}}')
        );

        $price = $this->hostFact->pricequotes()->edit([
            'Identifier' => '1',
            'PriceQuoteLines' => [
                [
                    'Identifier' => 2,
                    'PriceExcl' => 20,
                    'Periods' => 1,
                    'Periodic' => 'm'
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'pricequote', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'pricequote' => ['Identifier' => '1', 'PriceQuoteCode' => 'OF0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '0', 'Date' => '2018-01-14', 'Term' => '30', 'ExpirationDate' => '2018-02-13 00:00:00', 'AmountExcl' => '170.00', 'AmountTax' => '35.70', 'AmountIncl' => '205.70', 'TaxRate' => '0', 'Compound' => 'no', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PriceQuoteMethod' => '0', 'Template' => '2', 'SentDate' => '', 'Sent' => '0', 'Description' => '', 'Comment' => '', 'PriceQuoteLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '2', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '20', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => 'm', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-02-14', 'NoDiscountAmountIncl' => '24.2', 'NoDiscountAmountExcl' => '20', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'AcceptURL' => '', 'Attachments' => [0 => ['Identifier' => '5', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Concept', 'Country' => 'Nederland', 'PriceQuoteMethod' => 'Per e-mail', 'Template' => 'Offerte'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '170', 'AmountTax' => '35.7', 'AmountIncl' => '205.7']]]], $price);
    }

    /** @test */
    public function it_can_get_all_the_price_quotes()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequote","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"1","currentresults":"1","offset":"0","pricequotes":[{"Identifier":"1","PriceQuoteCode":"OF0001","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","AmountExcl":"165.00","AmountIncl":"199.65","Date":"2018-01-14","ExpirationDate":"2018-02-13","Status":"0","Modified":"2019-05-20 12:00:00"}]}')
        );

        $price = $this->hostFact->pricequotes()->list([
            // 'searchat' => 'Date',
            // 'searchfor' => '2014-05-14'
        ]);

        $this->assertSame(['controller' => 'pricequote', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '1', 'currentresults' => '1', 'offset' => '0', 'pricequotes' => [0 => ['Identifier' => '1', 'PriceQuoteCode' => 'OF0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'AmountExcl' => '165.00', 'AmountIncl' => '199.65', 'Date' => '2018-01-14', 'ExpirationDate' => '2018-02-13', 'Status' => '0', 'Modified' => '2019-05-20 12:00:00']]], $price);
    }

    /** @test */
    public function it_can_send_by_email_an_existing_price_quotes()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequote","action":"sendbyemail","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Offerte OF0001 is per e-mail verzonden naar info@company.com"],"pricequote":{"Identifier":"1","PriceQuoteCode":"OF0001","Debtor":"1","DebtorCode":"DB0001","Status":"2","Date":"2018-01-14","Term":"30","ExpirationDate":"2018-02-13 00:00:00","AmountExcl":"165.00","AmountTax":"34,65","AmountIncl":"199.65","TaxRate":"0","Compound":"no","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PriceQuoteMethod":"0","Template":"2","SentDate":"2019-05-17","Sent":"1","Description":"","Comment":"","PriceQuoteLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"2","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","AcceptURL":"<a href={\"}http://company.com/klantenpaneel/accept/?pricequote=OF0001&key=ddb48368d0aa7ec6c9c8a4f2a6a3d3b1{\"}>http://company.com/klantenpaneel/accept/?pricequote=OF0001&key=ddb48368d0aa7ec6c9c8a4f2a6a3d3b1</a>","Attachments":[{"Identifier":"5","Filename":"sample.pdf"}],"Translations":{"Status":"Verzonden","Country":"Nederland","PriceQuoteMethod":"Per e-mail","Template":"Offerte"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $price = $this->hostFact->pricequotes()->sendByEmail([
            'PriceQuoteCode' => 'OF0001'
        ]);

        $this->assertSame(['controller' => 'pricequote', 'action' => 'sendbyemail', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Offerte OF0001 is per e-mail verzonden naar info@company.com'], 'pricequote' => ['Identifier' => '1', 'PriceQuoteCode' => 'OF0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '2', 'Date' => '2018-01-14', 'Term' => '30', 'ExpirationDate' => '2018-02-13 00:00:00', 'AmountExcl' => '165.00', 'AmountTax' => '34,65', 'AmountIncl' => '199.65', 'TaxRate' => '0', 'Compound' => 'no', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PriceQuoteMethod' => '0', 'Template' => '2', 'SentDate' => '2019-05-17', 'Sent' => '1', 'Description' => '', 'Comment' => '', 'PriceQuoteLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '2', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'AcceptURL' => '<a href={"}http://company.com/klantenpaneel/accept/?pricequote=OF0001&key=ddb48368d0aa7ec6c9c8a4f2a6a3d3b1{"}>http://company.com/klantenpaneel/accept/?pricequote=OF0001&key=ddb48368d0aa7ec6c9c8a4f2a6a3d3b1</a>', 'Attachments' => [0 => ['Identifier' => '5', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Verzonden', 'Country' => 'Nederland', 'PriceQuoteMethod' => 'Per e-mail', 'Template' => 'Offerte'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $price);
    }

    /** @test */
    public function it_can_show_an_price_quote()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"pricequote","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","pricequote":{"Identifier":"1","PriceQuoteCode":"OF0001","Debtor":"1","DebtorCode":"DB0001","Status":"0","Date":"2018-01-14","Term":"30","ExpirationDate":"2018-02-13 00:00:00","AmountExcl":"165.00","AmountTax":"34.65","AmountIncl":"199.65","TaxRate":"0","Compound":"no","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","ReferenceNumber":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PriceQuoteMethod":"0","Template":"2","SentDate":"","Sent":"0","Description":"","Comment":"","PriceQuoteLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"","Description":"Setupfee","PriceExcl":"150","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"","StartPeriod":"","EndPeriod":"","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"2","Date":"2018-01-14","Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","DiscountPercentage":"0","DiscountPercentageType":"line","TaxPercentage":"21","Periods":"1","Periodic":"j","StartPeriod":"2018-01-14","EndPeriod":"2018-01-14","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","AcceptURL":"","Attachments":[{"Identifier":"5","Filename":"sample.pdf"}],"Translations":{"Status":"Concept","Country":"Nederland","PriceQuoteMethod":"Per e-mail","Template":"Offerte"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $price = $this->hostFact->pricequotes()->show([
            'PriceQuoteCode' => 'OF0001'
        ]);

        $this->assertSame(['controller' => 'pricequote', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'pricequote' => ['Identifier' => '1', 'PriceQuoteCode' => 'OF0001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'Status' => '0', 'Date' => '2018-01-14', 'Term' => '30', 'ExpirationDate' => '2018-02-13 00:00:00', 'AmountExcl' => '165.00', 'AmountTax' => '34.65', 'AmountIncl' => '199.65', 'TaxRate' => '0', 'Compound' => 'no', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'ReferenceNumber' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PriceQuoteMethod' => '0', 'Template' => '2', 'SentDate' => '', 'Sent' => '0', 'Description' => '', 'Comment' => '', 'PriceQuoteLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => '', 'StartPeriod' => '', 'EndPeriod' => '', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '2', 'Date' => '2018-01-14', 'Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'TaxPercentage' => '21', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-01-14', 'EndPeriod' => '2018-01-14', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'AcceptURL' => '', 'Attachments' => [0 => ['Identifier' => '5', 'Filename' => 'sample.pdf']], 'Translations' => ['Status' => 'Concept', 'Country' => 'Nederland', 'PriceQuoteMethod' => 'Per e-mail', 'Template' => 'Offerte'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $price);
    }
}
