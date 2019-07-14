<?php

namespace nickurt\HostFact\Tests\Endpoints;

class ProductsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_product()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"product","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","product":{"Identifier":"6","ProductCode":"P006","ProductName":"Product 1","ProductKeyPhrase":"Product decription for invoice","ProductDescription":"","NumberSuffix":"","PriceExcl":"100","PricePeriod":"","TaxPercentage":"21","Cost":"0","ProductType":"other","ProductTld":"","PackageID":"0","HasCustomPrice":"no","CustomPrices":"","Groups":[],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"ProductType":"Algemeen","PricePeriod":"eenmalig"}}}')
        );

        $product = $this->hostFact->products()->add([
            'ProductName' => 'Product 1',
            'ProductKeyPhrase' => 'Product decription for invoice',
            'PriceExcl' => '100'
        ]);

        $this->assertSame(['controller' => 'product', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'product' => ['Identifier' => '6', 'ProductCode' => 'P006', 'ProductName' => 'Product 1', 'ProductKeyPhrase' => 'Product decription for invoice', 'ProductDescription' => '', 'NumberSuffix' => '', 'PriceExcl' => '100', 'PricePeriod' => '', 'TaxPercentage' => '21', 'Cost' => '0', 'ProductType' => 'other', 'ProductTld' => '', 'PackageID' => '0', 'HasCustomPrice' => 'no', 'CustomPrices' => '', 'Groups' => [], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['ProductType' => 'Algemeen', 'PricePeriod' => 'eenmalig']]], $product);
    }

    /** @test */
    public function it_can_delete_an_existing_product()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"product","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Product P001 is verwijderd"]}')
        );

        $product = $this->hostFact->products()->delete([
            'ProductCode' => 'P001'
        ]);

        $this->assertSame(['controller' => 'product', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Product P001 is verwijderd']], $product);
    }

    /** @test */
    public function it_can_edit_an_existing_product()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"product","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","product":{"Identifier":"1","ProductCode":"P002","ProductName":"Hosting small","ProductKeyPhrase":"Hosting small","ProductDescription":"","NumberSuffix":"","PriceExcl":"50.75","PricePeriod":"m","TaxPercentage":"21","Cost":"0","ProductType":"hosting","ProductTld":"","PackageID":"1","HasCustomPrice":"no","CustomPrices":"","Groups":{"2":{"id":"2","GroupName":"Hosting bestelformulier"}},"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"ProductType":"Webhosting","PricePeriod":"maand"}}}')
        );

        $product = $this->hostFact->products()->edit([
            'Identifier' => '1',
            'PriceExcl' => 50.75
        ]);

        $this->assertSame(['controller' => 'product', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'product' => ['Identifier' => '1', 'ProductCode' => 'P002', 'ProductName' => 'Hosting small', 'ProductKeyPhrase' => 'Hosting small', 'ProductDescription' => '', 'NumberSuffix' => '', 'PriceExcl' => '50.75', 'PricePeriod' => 'm', 'TaxPercentage' => '21', 'Cost' => '0', 'ProductType' => 'hosting', 'ProductTld' => '', 'PackageID' => '1', 'HasCustomPrice' => 'no', 'CustomPrices' => '', 'Groups' => [2 => ['id' => '2', 'GroupName' => 'Hosting bestelformulier']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['ProductType' => 'Webhosting', 'PricePeriod' => 'maand']]], $product);
    }

    /** @test */
    public function it_can_list_all_the_products()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"product","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"5","currentresults":"5","offset":"0","products":[{"Identifier":"3","ProductCode":"P001","ProductName":"Default","ProductKeyPhrase":"Default product","ProductDescription":"","ProductType":"other","ProductTld":"","PackageID":"","NumberSuffix":"","PriceExcl":"250","TaxPercentage":"21","PricePeriod":"","Modified":"2019-05-20 12:00:00"},{"Identifier":"1","ProductCode":"P002","ProductName":"Hosting small","ProductKeyPhrase":"Hosting small","ProductDescription":"","ProductType":"hosting","ProductTld":"","PackageID":"1","NumberSuffix":"","PriceExcl":"25","TaxPercentage":"21","PricePeriod":"m","Modified":"2019-05-20 12:00:00"},{"Identifier":"2","ProductCode":"P003","ProductName":"Domain .com","ProductKeyPhrase":"Domain .com","ProductDescription":"","ProductType":"domain","ProductTld":"com","PackageID":"","NumberSuffix":"","PriceExcl":"15","TaxPercentage":"21","PricePeriod":"j","Modified":"2019-05-20 12:00:00"},{"Identifier":"4","ProductCode":"P004","ProductName":"SSL product","ProductKeyPhrase":"SSL certificate","ProductDescription":"","ProductType":"ssl","ProductTld":"","PackageID":"1","NumberSuffix":"","PriceExcl":"50","TaxPercentage":"21","PricePeriod":"j","Modified":"2019-05-20 12:00:00"},{"Identifier":"5","ProductCode":"P005","ProductName":"VPS package 1","ProductKeyPhrase":"VPS package 1","ProductDescription":"","ProductType":"vps","ProductTld":"","PackageID":"1","NumberSuffix":"","PriceExcl":"35","TaxPercentage":"21","PricePeriod":"m","Modified":"2019-05-20 12:00:00"}]}')
        );

        $products = $this->hostFact->products()->list([
            // 'searchfor' => ''
        ]);

        $this->assertSame(['controller' => 'product', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '5', 'currentresults' => '5', 'offset' => '0', 'products' => [0 => ['Identifier' => '3', 'ProductCode' => 'P001', 'ProductName' => 'Default', 'ProductKeyPhrase' => 'Default product', 'ProductDescription' => '', 'ProductType' => 'other', 'ProductTld' => '', 'PackageID' => '', 'NumberSuffix' => '', 'PriceExcl' => '250', 'TaxPercentage' => '21', 'PricePeriod' => '', 'Modified' => '2019-05-20 12:00:00'], 1 => ['Identifier' => '1', 'ProductCode' => 'P002', 'ProductName' => 'Hosting small', 'ProductKeyPhrase' => 'Hosting small', 'ProductDescription' => '', 'ProductType' => 'hosting', 'ProductTld' => '', 'PackageID' => '1', 'NumberSuffix' => '', 'PriceExcl' => '25', 'TaxPercentage' => '21', 'PricePeriod' => 'm', 'Modified' => '2019-05-20 12:00:00'], 2 => ['Identifier' => '2', 'ProductCode' => 'P003', 'ProductName' => 'Domain .com', 'ProductKeyPhrase' => 'Domain .com', 'ProductDescription' => '', 'ProductType' => 'domain', 'ProductTld' => 'com', 'PackageID' => '', 'NumberSuffix' => '', 'PriceExcl' => '15', 'TaxPercentage' => '21', 'PricePeriod' => 'j', 'Modified' => '2019-05-20 12:00:00'], 3 => ['Identifier' => '4', 'ProductCode' => 'P004', 'ProductName' => 'SSL product', 'ProductKeyPhrase' => 'SSL certificate', 'ProductDescription' => '', 'ProductType' => 'ssl', 'ProductTld' => '', 'PackageID' => '1', 'NumberSuffix' => '', 'PriceExcl' => '50', 'TaxPercentage' => '21', 'PricePeriod' => 'j', 'Modified' => '2019-05-20 12:00:00'], 4 => ['Identifier' => '5', 'ProductCode' => 'P005', 'ProductName' => 'VPS package 1', 'ProductKeyPhrase' => 'VPS package 1', 'ProductDescription' => '', 'ProductType' => 'vps', 'ProductTld' => '', 'PackageID' => '1', 'NumberSuffix' => '', 'PriceExcl' => '35', 'TaxPercentage' => '21', 'PricePeriod' => 'm', 'Modified' => '2019-05-20 12:00:00']]], $products);
    }

    /** @test */
    public function it_can_show_an_product()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"product","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","product":{"Identifier":"3","ProductCode":"P001","ProductName":"Default","ProductKeyPhrase":"Default product","ProductDescription":"","NumberSuffix":"","PriceExcl":"250","PricePeriod":"","TaxPercentage":"21","Cost":"0","ProductType":"other","ProductTld":"","PackageID":"0","HasCustomPrice":"no","CustomPrices":"","Groups":[],"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"ProductType":"Algemeen","PricePeriod":"eenmalig"}}}')
        );

        $product = $this->hostFact->products()->show([
            'ProductCode' => 'P001'
        ]);

        $this->assertSame(['controller' => 'product', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'product' => ['Identifier' => '3', 'ProductCode' => 'P001', 'ProductName' => 'Default', 'ProductKeyPhrase' => 'Default product', 'ProductDescription' => '', 'NumberSuffix' => '', 'PriceExcl' => '250', 'PricePeriod' => '', 'TaxPercentage' => '21', 'Cost' => '0', 'ProductType' => 'other', 'ProductTld' => '', 'PackageID' => '0', 'HasCustomPrice' => 'no', 'CustomPrices' => '', 'Groups' => [], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['ProductType' => 'Algemeen', 'PricePeriod' => 'eenmalig']]], $product);
    }
}