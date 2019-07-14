<?php

namespace nickurt\HostFact\Tests\Endpoints;

class GroupsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_group()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"group","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Productgroep \'Productgroep 1\' is aangemaakt"],"group":{"Identifier":"5","GroupName":"Productgroep 1","Type":"product","Items":{"1":{"Identifier":"1","ProductCode":"P002","ProductName":"Hosting small"}}}}')
        );

        $group = $this->hostFact->groups()->add([
            'GroupName' => 'Productgroep 1',
            'Type' => 'product',
            'Items' => ['1']
        ]);

        $this->assertSame(['controller' => 'group', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Productgroep \'Productgroep 1\' is aangemaakt'], 'group' => ['Identifier' => '5', 'GroupName' => 'Productgroep 1', 'Type' => 'product', 'Items' => [1 => ['Identifier' => '1', 'ProductCode' => 'P002', 'ProductName' => 'Hosting small']]]], $group);
    }

    /** @test */
    public function it_can_delete_an_existing_group()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"group","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Productgroep \'Opties bestelformulier\' is verwijderd"]}')
        );

        $group = $this->hostFact->groups()->delete([
            'Identifier' => 3
        ]);

        $this->assertSame(['controller' => 'group', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Productgroep \'Opties bestelformulier\' is verwijderd']], $group);
    }

    /** @test */
    public function it_can_edit_an_existing_group()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"group","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Productgroep \'Productgroep\' is bewerkt"],"group":{"Identifier":"1","GroupName":"Productgroep","Type":"product","Items":{"1":{"Identifier":"1","ProductCode":"P002","ProductName":"Hosting small"},"2":{"Identifier":"2","ProductCode":"P003","ProductName":"Domain .com"}}}}')
        );

        $group = $this->hostFact->groups()->edit([
            'Identifier' => 1,
            'GroupName' => 'Productgroep',
            'Items' => ['1', '2']
        ]);

        $this->assertSame(['controller' => 'group', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Productgroep \'Productgroep\' is bewerkt'], 'group' => ['Identifier' => '1', 'GroupName' => 'Productgroep', 'Type' => 'product', 'Items' => [1 => ['Identifier' => '1', 'ProductCode' => 'P002', 'ProductName' => 'Hosting small'], 2 => ['Identifier' => '2', 'ProductCode' => 'P003', 'ProductName' => 'Domain .com']]]], $group);
    }

    /** @test */
    public function it_can_get_all_the_groups()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"group","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"3","currentresults":"3","offset":"0","filters":{"type":"product"},"groups":[{"Identifier":"1","GroupName":"Domeinnamen bestelformulier","Type":"product","Items":["2"]},{"Identifier":"2","GroupName":"Hosting bestelformulier","Type":"product","Items":["1"]},{"Identifier":"3","GroupName":"Opties bestelformulier","Type":"product","Items":[]}]}')
        );

        $groups = $this->hostFact->groups()->list([
            'type' => 'product'
        ]);

        $this->assertSame(['controller' => 'group', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '3', 'currentresults' => '3', 'offset' => '0', 'filters' => ['type' => 'product'], 'groups' => [0 => ['Identifier' => '1', 'GroupName' => 'Domeinnamen bestelformulier', 'Type' => 'product', 'Items' => [0 => '2']], 1 => ['Identifier' => '2', 'GroupName' => 'Hosting bestelformulier', 'Type' => 'product', 'Items' => [0 => '1']], 2 => ['Identifier' => '3', 'GroupName' => 'Opties bestelformulier', 'Type' => 'product', 'Items' => []]]], $groups);
    }

    /** @test */
    public function it_can_show_an_existing_group()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"group","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","group":{"Identifier":"1","GroupName":"Domeinnamen bestelformulier","Type":"product","Items":{"2":{"Identifier":"2","ProductCode":"P003","ProductName":"Domain .com"}}}}')
        );

        $group = $this->hostFact->groups()->show([
            'Identifier' => 1
        ]);

        $this->assertSame(['controller' => 'group', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'group' => ['Identifier' => '1', 'GroupName' => 'Domeinnamen bestelformulier', 'Type' => 'product', 'Items' => [2 => ['Identifier' => '2', 'ProductCode' => 'P003', 'ProductName' => 'Domain .com']]]], $group);
    }
}
