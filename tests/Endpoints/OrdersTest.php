<?php

namespace nickurt\HostFact\Tests\Endpoints;

class OrdersTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_order()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"order","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","order":{"Identifier":"2","OrderCode":"B0002","Debtor":"1","Date":"2019-05-17 11:18:52","Term":"14","AmountExcl":"165.00","AmountTax":"34.65","AmountIncl":"199.65","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"0","Authorisation":"no","PaymentMethod":"","Paid":"0","TransactionID":"","IPAddress":"","Comment":"","Status":"0","OrderLines":[{"Identifier":"3","Date":"2019-05-17","Number":"1","ProductCode":"","Description":"Setupfee","PriceExcl":"150","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"4","Date":"2019-05-17","Number":"1","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"j","ProductType":"","Reference":"0","NoDiscountAmountIncl":"18.15","NoDiscountAmountExcl":"15","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"","PaymentMethod":"","Status":"Ontvangen"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"165","AmountTax":"34.65","AmountIncl":"199.65"}}}}')
        );

        $order = $this->hostFact->orders()->add([
            'DebtorCode' => 'DB0001',
            'OrderLines' => [
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

        $this->assertSame(['controller' => 'order', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'order' => ['Identifier' => '2', 'OrderCode' => 'B0002', 'Debtor' => '1', 'Date' => '2019-05-17 11:18:52', 'Term' => '14', 'AmountExcl' => '165.00', 'AmountTax' => '34.65', 'AmountIncl' => '199.65', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '0', 'Authorisation' => 'no', 'PaymentMethod' => '', 'Paid' => '0', 'TransactionID' => '', 'IPAddress' => '', 'Comment' => '', 'Status' => '0', 'OrderLines' => [0 => ['Identifier' => '3', 'Date' => '2019-05-17', 'Number' => '1', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '4', 'Date' => '2019-05-17', 'Number' => '1', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => 'j', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '18.15', 'NoDiscountAmountExcl' => '15', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => '', 'PaymentMethod' => '', 'Status' => 'Ontvangen'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '165', 'AmountTax' => '34.65', 'AmountIncl' => '199.65']]]], $order);
    }

    /** @test */
    public function it_can_add_a_new_order_line_to_an_existing_order()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"orderline","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Er zijn 1 bestelregels toegevoegd"],"order":{"Identifier":"1","OrderCode":"B0001","Debtor":"1","Date":"2018-01-14 14:10:51","Term":"14","AmountExcl":"205.00","AmountTax":"43.05","AmountIncl":"248.05","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","Authorisation":"no","PaymentMethod":"","Paid":"0","TransactionID":"","IPAddress":"","Comment":"","Status":"0","OrderLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","ProductCode":"","Description":"Setupfee","PriceExcl":"150","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"2","Date":"2018-01-14","Number":"1","ProductCode":"","Description":"Second product","PriceExcl":"5","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"6.05","NoDiscountAmountExcl":"5","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"3","Date":"2019-05-17","Number":"1","ProductCode":"","Description":"Additional fee","PriceExcl":"50","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"60.5","NoDiscountAmountExcl":"50","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":"","Status":"Ontvangen"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"205","AmountTax":"43.05","AmountIncl":"248.05"}}}}')
        );

        $order = $this->hostFact->orders()->line()->add([
            'OrderCode' => 'B0001',
            'OrderLines' => [
                [
                    'Description' => 'Additional fee',
                    'PriceExcl' => 50
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'orderline', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Er zijn 1 bestelregels toegevoegd'], 'order' => ['Identifier' => '1', 'OrderCode' => 'B0001', 'Debtor' => '1', 'Date' => '2018-01-14 14:10:51', 'Term' => '14', 'AmountExcl' => '205.00', 'AmountTax' => '43.05', 'AmountIncl' => '248.05', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'Authorisation' => 'no', 'PaymentMethod' => '', 'Paid' => '0', 'TransactionID' => '', 'IPAddress' => '', 'Comment' => '', 'Status' => '0', 'OrderLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '2', 'Date' => '2018-01-14', 'Number' => '1', 'ProductCode' => '', 'Description' => 'Second product', 'PriceExcl' => '5', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '6.05', 'NoDiscountAmountExcl' => '5', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 2 => ['Identifier' => '3', 'Date' => '2019-05-17', 'Number' => '1', 'ProductCode' => '', 'Description' => 'Additional fee', 'PriceExcl' => '50', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '60.5', 'NoDiscountAmountExcl' => '50', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => '', 'Status' => 'Ontvangen'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '205', 'AmountTax' => '43.05', 'AmountIncl' => '248.05']]]], $order);
    }

    /** @test */
    public function it_can_delete_an_existing_order()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"order","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Bestelling \'B0001\' verwijderd"]}')
        );

        $order = $this->hostFact->orders()->delete([
            'OrderCode' => 'B0001'
        ]);

        $this->assertSame(['controller' => 'order', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Bestelling \'B0001\' verwijderd']], $order);
    }

    /** @test */
    public function it_can_delete_an_order_line_of_an_existing_order()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"orderline","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Er zijn 1 bestelregels verwijderd"],"order":{"Identifier":"1","OrderCode":"B0001","Debtor":"1","Date":"2018-01-14 14:10:51","Term":"14","AmountExcl":"150.00","AmountTax":"31.50","AmountIncl":"181.50","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","Authorisation":"no","PaymentMethod":"","Paid":"0","TransactionID":"","IPAddress":"","Comment":"","Status":"0","OrderLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","ProductCode":"","Description":"Setupfee","PriceExcl":"150","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":"","Status":"Ontvangen"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"150","AmountTax":"31.5","AmountIncl":"181.5"}}}}')
        );

        $order = $this->hostFact->orders()->line()->delete([
            'OrderCode' => 'B0001',
            'OrderLines' => [
                [
                    'Identifier' => 2
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'orderline', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Er zijn 1 bestelregels verwijderd'], 'order' => ['Identifier' => '1', 'OrderCode' => 'B0001', 'Debtor' => '1', 'Date' => '2018-01-14 14:10:51', 'Term' => '14', 'AmountExcl' => '150.00', 'AmountTax' => '31.50', 'AmountIncl' => '181.50', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'Authorisation' => 'no', 'PaymentMethod' => '', 'Paid' => '0', 'TransactionID' => '', 'IPAddress' => '', 'Comment' => '', 'Status' => '0', 'OrderLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => '', 'Status' => 'Ontvangen'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '150', 'AmountTax' => '31.5', 'AmountIncl' => '181.5']]]], $order);
    }

    /** @test */
    public function it_can_edit_an_existing_order()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"order","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","order":{"Identifier":"1","OrderCode":"B0001","Debtor":"1","Date":"2018-01-14 14:10:51","Term":"14","AmountExcl":"5.00","AmountTax":"1.05","AmountIncl":"6.05","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","Authorisation":"no","PaymentMethod":"","Paid":"0","TransactionID":"","IPAddress":"","Comment":"","Status":"0","OrderLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","ProductCode":"","Description":"Free domain example.com","PriceExcl":"0","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"0","NoDiscountAmountExcl":"0","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"2","Date":"2018-01-14","Number":"1","ProductCode":"","Description":"Second product","PriceExcl":"5","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"6.05","NoDiscountAmountExcl":"5","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":"","Status":"Ontvangen"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"5","AmountTax":"1.05","AmountIncl":"6.05"}}}}')
        );

        $order = $this->hostFact->orders()->edit([
            'Identifier' => 1,
            'OrderLines' => [
                [
                    'Identifier' => 1,
                    'Description' => 'Free domain example.com',
                    'PriceExcl' => 0
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'order', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'order' => ['Identifier' => '1', 'OrderCode' => 'B0001', 'Debtor' => '1', 'Date' => '2018-01-14 14:10:51', 'Term' => '14', 'AmountExcl' => '5.00', 'AmountTax' => '1.05', 'AmountIncl' => '6.05', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'Authorisation' => 'no', 'PaymentMethod' => '', 'Paid' => '0', 'TransactionID' => '', 'IPAddress' => '', 'Comment' => '', 'Status' => '0', 'OrderLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'ProductCode' => '', 'Description' => 'Free domain example.com', 'PriceExcl' => '0', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '0', 'NoDiscountAmountExcl' => '0', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '2', 'Date' => '2018-01-14', 'Number' => '1', 'ProductCode' => '', 'Description' => 'Second product', 'PriceExcl' => '5', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '6.05', 'NoDiscountAmountExcl' => '5', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => '', 'Status' => 'Ontvangen'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '5', 'AmountTax' => '1.05', 'AmountIncl' => '6.05']]]], $order);
    }

    /** @test */
    public function it_can_get_all_the_orders()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"order","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"1","currentresults":"1","offset":"0","filters":{"status":"0"},"orders":[{"Identifier":"1","OrderCode":"B0001","Debtor":"1","CompanyName":"Company X","Initials":"John","SurName":"Jackson","AmountExcl":"155.00","AmountIncl":"187.55","Date":"2018-01-14 14:10:51","Status":"0","Modified":"2019-05-20 12:00:00"}]}')
        );

        $orders = $this->hostFact->orders()->list([
            'status' => '0'
        ]);

        $this->assertSame(['controller' => 'order', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '1', 'currentresults' => '1', 'offset' => '0', 'filters' => ['status' => '0'], 'orders' => [0 => ['Identifier' => '1', 'OrderCode' => 'B0001', 'Debtor' => '1', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'AmountExcl' => '155.00', 'AmountIncl' => '187.55', 'Date' => '2018-01-14 14:10:51', 'Status' => '0', 'Modified' => '2019-05-20 12:00:00']]], $orders);
    }

    /** @test */
    public function it_can_get_an_order()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"order","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","order":{"Identifier":"1","OrderCode":"B0001","Debtor":"1","Date":"2018-01-14 14:10:51","Term":"14","AmountExcl":"155.00","AmountTax":"32.55","AmountIncl":"187.55","Discount":"0","VatCalcMethod":"excl","IgnoreDiscount":"no","Coupon":"","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","InvoiceMethod":"0","Template":"1","Authorisation":"no","PaymentMethod":"","Paid":"0","TransactionID":"","IPAddress":"","Comment":"","Status":"0","OrderLines":[{"Identifier":"1","Date":"2018-01-14","Number":"1","ProductCode":"","Description":"Setupfee","PriceExcl":"150","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"181.5","NoDiscountAmountExcl":"150","DiscountAmountIncl":"0","DiscountAmountExcl":"0"},{"Identifier":"2","Date":"2018-01-14","Number":"1","ProductCode":"","Description":"Second product","PriceExcl":"5","TaxPercentage":"21","DiscountPercentage":"0","DiscountPercentageType":"line","Periods":"1","Periodic":"","ProductType":"","Reference":"0","NoDiscountAmountIncl":"6.05","NoDiscountAmountExcl":"5","DiscountAmountIncl":"0","DiscountAmountExcl":"0"}],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"Country":"Nederland","InvoiceMethod":"Per e-mail","Template":"Factuur","PaymentMethod":"","Status":"Ontvangen"},"AmountDiscount":"0","AmountDiscountIncl":"0","UsedTaxrates":{"0.21":{"AmountExcl":"155","AmountTax":"32.55","AmountIncl":"187.55"}}}}')
        );

        $order = $this->hostFact->orders()->show([
            'OrderCode' => 'B0001'
        ]);

        $this->assertSame(['controller' => 'order', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'order' => ['Identifier' => '1', 'OrderCode' => 'B0001', 'Debtor' => '1', 'Date' => '2018-01-14 14:10:51', 'Term' => '14', 'AmountExcl' => '155.00', 'AmountTax' => '32.55', 'AmountIncl' => '187.55', 'Discount' => '0', 'VatCalcMethod' => 'excl', 'IgnoreDiscount' => 'no', 'Coupon' => '', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'InvoiceMethod' => '0', 'Template' => '1', 'Authorisation' => 'no', 'PaymentMethod' => '', 'Paid' => '0', 'TransactionID' => '', 'IPAddress' => '', 'Comment' => '', 'Status' => '0', 'OrderLines' => [0 => ['Identifier' => '1', 'Date' => '2018-01-14', 'Number' => '1', 'ProductCode' => '', 'Description' => 'Setupfee', 'PriceExcl' => '150', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '181.5', 'NoDiscountAmountExcl' => '150', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0'], 1 => ['Identifier' => '2', 'Date' => '2018-01-14', 'Number' => '1', 'ProductCode' => '', 'Description' => 'Second product', 'PriceExcl' => '5', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'DiscountPercentageType' => 'line', 'Periods' => '1', 'Periodic' => '', 'ProductType' => '', 'Reference' => '0', 'NoDiscountAmountIncl' => '6.05', 'NoDiscountAmountExcl' => '5', 'DiscountAmountIncl' => '0', 'DiscountAmountExcl' => '0']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'Template' => 'Factuur', 'PaymentMethod' => '', 'Status' => 'Ontvangen'], 'AmountDiscount' => '0', 'AmountDiscountIncl' => '0', 'UsedTaxrates' => ['0.21' => ['AmountExcl' => '155', 'AmountTax' => '32.55', 'AmountIncl' => '187.55']]]], $order);
    }

    /** @test */
    public function it_can_process_an_existing_order()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"order","action":"process","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Bestelling B0001 is doorgezet"]}')
        );

        $order = $this->hostFact->orders()->process([
            'OrderCode' => 'B0001'
        ]);

        $this->assertSame(['controller' => 'order', 'action' => 'process', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Bestelling B0001 is doorgezet']], $order);
    }
}
