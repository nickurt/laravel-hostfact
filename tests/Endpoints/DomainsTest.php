<?php

namespace nickurt\HostFact\Tests\Endpoints;

class DomainsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","warning":["De domeinnaam example.com bestaat al in HostFact"],"domain":{"Identifier":"3","Domain":"example","Tld":"com","Debtor":"1","DebtorCode":"DB0001","HostingID":"0","Status":"1","RegistrationDate":"","ExpirationDate":"","Registrar":"1","DNS1":"ns1.example.com","DNS2":"ns2.example.com","DNS3":"","DNS1IP":"","DNS2IP":"","DNS3IP":"","DNSTemplate":"0","OwnerHandle":"1","AdminHandle":"1","TechHandle":"1","DomainAutoRenew":"on","Comment":"","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","RegistrarInfo":{"Identifier":"1","Class":"registrarclass","Name":"Example registrar","Testmode":"1","DefaultDNSTemplate":"0","AdminHandle":"0","TechHandle":"0"},"Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain example.com","PriceExcl":"15","PriceIncl":"18.15","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"j","StartPeriod":"2019-05-17","EndPeriod":"2020-05-17","NextDate":"2019-05-03","ContractPeriods":"1","ContractPeriodic":"j","StartContract":"2019-05-17","EndContract":"2020-05-17","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"15","AmountIncl":"18.15"},"Translations":{"RegistrarName":"Example registrar","Status":"Wachten op actie"}}}')
        );

        $domain = $this->hostFact->domains()->add([
            'DebtorCode' => 'DB0001',
            'Domain' => 'example',
            'Tld' => 'com',
            'Registrar' => 1,
            'HasSubscription' => 'yes',
            'Subscription' => [
                'ProductCode' => 'P003'
            ]
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'warning' => [0 => 'De domeinnaam example.com bestaat al in HostFact'], 'domain' => ['Identifier' => '3', 'Domain' => 'example', 'Tld' => 'com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'HostingID' => '0', 'Status' => '1', 'RegistrationDate' => '', 'ExpirationDate' => '', 'Registrar' => '1', 'DNS1' => 'ns1.example.com', 'DNS2' => 'ns2.example.com', 'DNS3' => '', 'DNS1IP' => '', 'DNS2IP' => '', 'DNS3IP' => '', 'DNSTemplate' => '0', 'OwnerHandle' => '1', 'AdminHandle' => '1', 'TechHandle' => '1', 'DomainAutoRenew' => 'on', 'Comment' => '', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'RegistrarInfo' => ['Identifier' => '1', 'Class' => 'registrarclass', 'Name' => 'Example registrar', 'Testmode' => '1', 'DefaultDNSTemplate' => '0', 'AdminHandle' => '0', 'TechHandle' => '0'], 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain example.com', 'PriceExcl' => '15', 'PriceIncl' => '18.15', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2019-05-17', 'EndPeriod' => '2020-05-17', 'NextDate' => '2019-05-03', 'ContractPeriods' => '1', 'ContractPeriodic' => 'j', 'StartContract' => '2019-05-17', 'EndContract' => '2020-05-17', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '15', 'AmountIncl' => '18.15'], 'Translations' => ['RegistrarName' => 'Example registrar', 'Status' => 'Wachten op actie']]], $domain);
    }

    /** @test */
    public function it_can_auto_renew_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"autorenew","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Autorenew is uitgezet in HostFact en bij de registrar"]}')
        );

        $domain = $this->hostFact->domains()->autoRenew([
            'Domain' => 'dnsexample',
            'Tld' => 'com',
            'DomainAutoRenew' => 'off'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'autorenew', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Autorenew is uitgezet in HostFact en bij de registrar']], $domain);
    }

    /** @test */
    public function it_can_change_nameserver_of_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"changenameserver","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De nameservers van domeinnaam dnsexample.com zijn aangepast in HostFact en bij de registrar Example registrar"]}')
        );

        $domain = $this->hostFact->domains()->changeNameServer([
            'Domain' => 'dnsexample',
            'Tld' => 'com',
            'DNS1' => 'ns1.example2.com',
            'DNS2' => 'ns2.example2.com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'changenameserver', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De nameservers van domeinnaam dnsexample.com zijn aangepast in HostFact en bij de registrar Example registrar']], $domain);
    }

    /** @test */
    public function it_can_check_if_domain_is_still_available()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"check","status":"success","date":"2019-05-20T12:00:00+02:00","domains":[{"Domain":"example2","Tld":"com","Available":"yes"}]}')
        );

        $domain = $this->hostFact->domains()->check([
            'Domain' => 'example2',
            'Tld' => 'com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'check', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'domains' => [0 => ['Domain' => 'example2', 'Tld' => 'com', 'Available' => 'yes']]], $domain);
    }

    /** @test */
    public function it_can_delete_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De domeinnaam example.com is verwijderd uit HostFact"]}')
        );

        $domain = $this->hostFact->domains()->delete([
            'Identifier' => '1',
            // 'Domain' => 'example',
            // 'Tld' => 'com',
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De domeinnaam example.com is verwijderd uit HostFact']], $domain);
    }

    /** @test */
    public function it_can_edit_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","warning":["De registratie en/of verloopdatum is niet ingevuld voor de domeinnaam."],"domain":{"Identifier":"1","Domain":"example","Tld":"com","Debtor":"1","DebtorCode":"DB0001","HostingID":"2","Status":"4","RegistrationDate":"","ExpirationDate":"2018-07-13","Registrar":"1","DNS1":"ns1.example.com","DNS2":"ns2.example.com","DNS3":"","DNS1IP":"","DNS2IP":"","DNS3IP":"","DNSTemplate":"1","OwnerHandle":"1","AdminHandle":"1","TechHandle":"1","DomainAutoRenew":"on","Comment":"","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","RegistrarInfo":{"Identifier":"1","Class":"registrarclass","Name":"Example registrar","Testmode":"1","DefaultDNSTemplate":"0","AdminHandle":"0","TechHandle":"0"},"Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain .com","PriceExcl":"15","PriceIncl":"18.15","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"j","StartPeriod":"2018-07-13","EndPeriod":"2019-07-13","NextDate":"2018-06-29","ContractPeriods":"1","ContractPeriodic":"j","StartContract":"2018-07-13","EndContract":"2018-07-13","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"15","AmountIncl":"18.15"},"Translations":{"RegistrarName":"Example registrar","Status":"Actief"},"NameserversManager":{"Type":"registrar","IntegrationID":"1"}}}')
        );

        $domain = $this->hostFact->domains()->list([
            'Domain' => 'example',
            'Tld' => 'com',
            'Status' => 4
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'warning' => [0 => 'De registratie en/of verloopdatum is niet ingevuld voor de domeinnaam.'], 'domain' => ['Identifier' => '1', 'Domain' => 'example', 'Tld' => 'com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'HostingID' => '2', 'Status' => '4', 'RegistrationDate' => '', 'ExpirationDate' => '2018-07-13', 'Registrar' => '1', 'DNS1' => 'ns1.example.com', 'DNS2' => 'ns2.example.com', 'DNS3' => '', 'DNS1IP' => '', 'DNS2IP' => '', 'DNS3IP' => '', 'DNSTemplate' => '1', 'OwnerHandle' => '1', 'AdminHandle' => '1', 'TechHandle' => '1', 'DomainAutoRenew' => 'on', 'Comment' => '', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'RegistrarInfo' => ['Identifier' => '1', 'Class' => 'registrarclass', 'Name' => 'Example registrar', 'Testmode' => '1', 'DefaultDNSTemplate' => '0', 'AdminHandle' => '0', 'TechHandle' => '0'], 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain .com', 'PriceExcl' => '15', 'PriceIncl' => '18.15', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-07-13', 'EndPeriod' => '2019-07-13', 'NextDate' => '2018-06-29', 'ContractPeriods' => '1', 'ContractPeriodic' => 'j', 'StartContract' => '2018-07-13', 'EndContract' => '2018-07-13', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '15', 'AmountIncl' => '18.15'], 'Translations' => ['RegistrarName' => 'Example registrar', 'Status' => 'Actief'], 'NameserversManager' => ['Type' => 'registrar', 'IntegrationID' => '1']]], $domain);
    }

    /** @test */
    public function it_can_edit_dns_zone_of_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"editdnszone","status":"success","date":"2019-05-20T12:00:00+02:00","domain":["DNS zone is succesvol aangepast bij \'Example registrar\'"]}')
        );

        $domain = $this->hostFact->domains()->editDnsZone([
            'Domain' => 'dnsexample',
            'Tld' => 'com',
            'DNSZone' => [
                ['name' => 'subdomein', 'type' => 'A', 'value' => '127.0.0.1', 'priority' => '', 'ttl' => 3600]
            ]
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'editdnszone', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'domain' => [0 => 'DNS zone is succesvol aangepast bij \'Example registrar\'']], $domain);
    }

    /** @test */
    public function it_can_edit_whois_of_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"editwhois","status":"success","date":"2019-05-20T12:00:00+02:00","warning":[],"success":["De WHOIS-gegevens van domeinnaam example.com zijn bijgewerkt bij de registrar."]}')
        );

        $domain = $this->hostFact->domains()->editWhois([
            'Domain' => 'example',
            'Tld' => 'com',
            'Admin' => [
                'CompanyName' => 'Company X',
                'Address' => 'Street 40',
            ],
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'editwhois', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'warning' => [], 'success' => [0 => 'De WHOIS-gegevens van domeinnaam example.com zijn bijgewerkt bij de registrar.']], $domain);
    }

    /** @test */
    public function it_can_get_all_the_dns_templates_for_domains()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"listdnstemplates","status":"success","date":"2019-05-20T12:00:00+02:00","dnstemplates":[{"id":"1","Name":"DNS template 1","DNSRecords":[],"TemplateID":"dns1","TemplateName":"DNS template 1"}]}')
        );

        $domain = $this->hostFact->domains()->listDnsTemplates([
            //
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'listdnstemplates', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'dnstemplates' => [0 => ['id' => '1', 'Name' => 'DNS template 1', 'DNSRecords' => [], 'TemplateID' => 'dns1', 'TemplateName' => 'DNS template 1']]], $domain);
    }

    /** @test */
    public function it_can_get_all_the_domains()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"2","currentresults":"2","offset":"0","filters":{"searchat":"DebtorCode","searchfor":"DB0001"},"domains":[{"Identifier":"2","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Domain":"dnsexample","Tld":"com","RegistrationDate":"","ExpirationDate":"2018-07-31","Status":"4","Registrar":"1","RegistrarName":"Example registrar","HostingID":"0","Modified":"2019-05-20 12:00:00"},{"Identifier":"1","Debtor":"1","DebtorCode":"DB0001","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Domain":"example","Tld":"com","RegistrationDate":"","ExpirationDate":"2018-07-13","Status":"1","Registrar":"1","RegistrarName":"Example registrar","HostingID":"2","Subscription":{"ProductCode":"P003","Description":"Domain .com","Number":"1","PriceExcl":"15","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"j","StartPeriod":"2018-07-13","EndPeriod":"2019-07-13","NextDate":"2018-06-29","TerminationDate":"","AmountExcl":"15","AmountIncl":"18.15"},"Modified":"2019-05-20 12:00:00"}]}')
        );

        $domain = $this->hostFact->domains()->list([
            'searchat' => 'DebtorCode',
            'searchfor' => 'DB0001'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '2', 'currentresults' => '2', 'offset' => '0', 'filters' => ['searchat' => 'DebtorCode', 'searchfor' => 'DB0001'], 'domains' => [0 => ['Identifier' => '2', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Domain' => 'dnsexample', 'Tld' => 'com', 'RegistrationDate' => '', 'ExpirationDate' => '2018-07-31', 'Status' => '4', 'Registrar' => '1', 'RegistrarName' => 'Example registrar', 'HostingID' => '0', 'Modified' => '2019-05-20 12:00:00'], 1 => ['Identifier' => '1', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Domain' => 'example', 'Tld' => 'com', 'RegistrationDate' => '', 'ExpirationDate' => '2018-07-13', 'Status' => '1', 'Registrar' => '1', 'RegistrarName' => 'Example registrar', 'HostingID' => '2', 'Subscription' => ['ProductCode' => 'P003', 'Description' => 'Domain .com', 'Number' => '1', 'PriceExcl' => '15', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-07-13', 'EndPeriod' => '2019-07-13', 'NextDate' => '2018-06-29', 'TerminationDate' => '', 'AmountExcl' => '15', 'AmountIncl' => '18.15'], 'Modified' => '2019-05-20 12:00:00']]], $domain);
    }

    /** @test */
    public function it_can_get_dns_zone_of_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"getdnszone","status":"success","date":"2019-05-20T12:00:00+02:00","domain":{"dns_zone":{"records":[{"name":"www","type":"A","value":"127.0.0.1","priority":"","ttl":"3600"},{"name":"mail","type":"MX","value":"127.0.0.1","priority":"10","ttl":"3600"}],"SettingSingleTTL":"","SettingAvailableTypes":{"A":"A","AAAA":"AAAA","CNAME":"CNAME","MX":"MX","SPF":"SPF","SRV":"SRV","TXT":"TXT","SOA":"SOA","NS":"NS"}}}}')
        );

        $domain = $this->hostFact->domains()->getDnsZone([
            'Domain' => 'dnsexample',
            'Tld' => 'com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'getdnszone', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'domain' => ['dns_zone' => ['records' => [0 => ['name' => 'www', 'type' => 'A', 'value' => '127.0.0.1', 'priority' => '', 'ttl' => '3600'], 1 => ['name' => 'mail', 'type' => 'MX', 'value' => '127.0.0.1', 'priority' => '10', 'ttl' => '3600']], 'SettingSingleTTL' => '', 'SettingAvailableTypes' => ['A' => 'A', 'AAAA' => 'AAAA', 'CNAME' => 'CNAME', 'MX' => 'MX', 'SPF' => 'SPF', 'SRV' => 'SRV', 'TXT' => 'TXT', 'SOA' => 'SOA', 'NS' => 'NS']]]], $domain);
    }

    /** @test */
    public function it_can_get_token_of_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"gettoken","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De autorisatiecode voor domeinnaam dnsexample.com is: XYZ0123"],"domain":{"Identifier":"2","Domain":"dnsexample","Tld":"com","AuthKey":"XYZ0123"}}')
        );

        $domain = $this->hostFact->domains()->getToken([
            'Domain' => 'dnsexample',
            'Tld' => 'com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'gettoken', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De autorisatiecode voor domeinnaam dnsexample.com is: XYZ0123'], 'domain' => ['Identifier' => '2', 'Domain' => 'dnsexample', 'Tld' => 'com', 'AuthKey' => 'XYZ0123']], $domain);
    }

    /** @test */
    public function it_can_lock_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"lock","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De domeinnaam dnsexample.com is gelocked"]}')
        );

        $domain = $this->hostFact->domains()->lock([
            'Domain' => 'dnsexample',
            'Tld' => 'com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'lock', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De domeinnaam dnsexample.com is gelocked']], $domain);
    }

    /** @test */
    public function it_can_register_an_new_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"register","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De domeinnaam example.com is geregistreerd"]}')
        );

        $domain = $this->hostFact->domains()->register([
            'Domain' => 'example',
            'Tld' => 'com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'register', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De domeinnaam example.com is geregistreerd']], $domain);
    }

    /** @test */
    public function it_can_show_the_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","domain":{"Identifier":"1","Domain":"example","Tld":"com","Debtor":"1","DebtorCode":"DB0001","HostingID":"2","Status":"1","RegistrationDate":"","ExpirationDate":"2018-07-13","Registrar":"1","DNS1":"ns1.example.com","DNS2":"ns2.example.com","DNS3":"","DNS1IP":"","DNS2IP":"","DNS3IP":"","DNSTemplate":"0","OwnerHandle":"1","AdminHandle":"1","TechHandle":"1","DomainAutoRenew":"on","Comment":"","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","RegistrarInfo":{"Identifier":"1","Class":"registrarclass","Name":"Example registrar","Testmode":"1","DefaultDNSTemplate":"0","AdminHandle":"0","TechHandle":"0"},"Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain .com","PriceExcl":"15","PriceIncl":"18.15","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"j","StartPeriod":"2018-07-13","EndPeriod":"2019-07-13","NextDate":"2018-06-29","ContractPeriods":"1","ContractPeriodic":"j","StartContract":"2018-07-13","EndContract":"2018-07-13","TerminationDate":"","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"15","AmountIncl":"18.15"},"Translations":{"RegistrarName":"Example registrar","Status":"Wachten op actie"}}}')
        );

        $domain = $this->hostFact->domains()->show([
            'Domain' => 'example',
            'Tld' => 'com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'domain' => ['Identifier' => '1', 'Domain' => 'example', 'Tld' => 'com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'HostingID' => '2', 'Status' => '1', 'RegistrationDate' => '', 'ExpirationDate' => '2018-07-13', 'Registrar' => '1', 'DNS1' => 'ns1.example.com', 'DNS2' => 'ns2.example.com', 'DNS3' => '', 'DNS1IP' => '', 'DNS2IP' => '', 'DNS3IP' => '', 'DNSTemplate' => '0', 'OwnerHandle' => '1', 'AdminHandle' => '1', 'TechHandle' => '1', 'DomainAutoRenew' => 'on', 'Comment' => '', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'RegistrarInfo' => ['Identifier' => '1', 'Class' => 'registrarclass', 'Name' => 'Example registrar', 'Testmode' => '1', 'DefaultDNSTemplate' => '0', 'AdminHandle' => '0', 'TechHandle' => '0'], 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain .com', 'PriceExcl' => '15', 'PriceIncl' => '18.15', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-07-13', 'EndPeriod' => '2019-07-13', 'NextDate' => '2018-06-29', 'ContractPeriods' => '1', 'ContractPeriodic' => 'j', 'StartContract' => '2018-07-13', 'EndContract' => '2018-07-13', 'TerminationDate' => '', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '15', 'AmountIncl' => '18.15'], 'Translations' => ['RegistrarName' => 'Example registrar', 'Status' => 'Wachten op actie']]], $domain);
    }

    /** @test */
    public function it_can_sync_whois_of_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"syncwhois","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De WHOIS-gegevens van domeinnaam example.com zijn bijgewerkt bij de registrar."]}')
        );

        $domain = $this->hostFact->domains()->syncWhois([
            'Domain' => 'example',
            'Tld' => 'com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'syncwhois', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De WHOIS-gegevens van domeinnaam example.com zijn bijgewerkt bij de registrar.']], $domain);
    }

    /** @test */
    public function it_can_terminate_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"terminate","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Dienst is opgezegd met opzegdatum 13-07-2019"],"domain":{"Identifier":"1","Domain":"example","Tld":"com","Debtor":"1","DebtorCode":"DB0001","HostingID":"2","Status":"1","RegistrationDate":"","ExpirationDate":"2018-07-13","Registrar":"1","DNS1":"ns1.example.com","DNS2":"ns2.example.com","DNS3":"","DNS1IP":"","DNS2IP":"","DNS3IP":"","DNSTemplate":"0","OwnerHandle":"1","AdminHandle":"1","TechHandle":"1","DomainAutoRenew":"on","Comment":"","Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","RegistrarInfo":{"Identifier":"1","Class":"registrarclass","Name":"Example registrar","Testmode":"1","DefaultDNSTemplate":"0","AdminHandle":"0","TechHandle":"0"},"Subscription":{"Number":"1","NumberSuffix":"","ProductCode":"P003","Description":"Domain .com","PriceExcl":"15","PriceIncl":"18.15","TaxPercentage":"21","DiscountPercentage":"0","Periods":"1","Periodic":"j","StartPeriod":"2018-07-13","EndPeriod":"2019-07-13","NextDate":"2018-06-29","ContractPeriods":"1","ContractPeriodic":"j","StartContract":"2018-07-13","EndContract":"2018-07-13","TerminationDate":"2019-07-13","Reminder":"","InvoiceAuthorisation":"yes","AmountExcl":"15","AmountIncl":"18.15"},"Termination":{"Date":"2019-07-13","Created":"2019-05-20 12:00:00","Status":"pending"},"Translations":{"RegistrarName":"Example registrar","Status":"Wachten op actie"}}}')
        );

        $domain = $this->hostFact->domains()->terminate([
            'Identifier' => '1',
            // 'Date' => '2015-01-01',
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'terminate', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Dienst is opgezegd met opzegdatum 13-07-2019'], 'domain' => ['Identifier' => '1', 'Domain' => 'example', 'Tld' => 'com', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'HostingID' => '2', 'Status' => '1', 'RegistrationDate' => '', 'ExpirationDate' => '2018-07-13', 'Registrar' => '1', 'DNS1' => 'ns1.example.com', 'DNS2' => 'ns2.example.com', 'DNS3' => '', 'DNS1IP' => '', 'DNS2IP' => '', 'DNS3IP' => '', 'DNSTemplate' => '0', 'OwnerHandle' => '1', 'AdminHandle' => '1', 'TechHandle' => '1', 'DomainAutoRenew' => 'on', 'Comment' => '', 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'RegistrarInfo' => ['Identifier' => '1', 'Class' => 'registrarclass', 'Name' => 'Example registrar', 'Testmode' => '1', 'DefaultDNSTemplate' => '0', 'AdminHandle' => '0', 'TechHandle' => '0'], 'Subscription' => ['Number' => '1', 'NumberSuffix' => '', 'ProductCode' => 'P003', 'Description' => 'Domain .com', 'PriceExcl' => '15', 'PriceIncl' => '18.15', 'TaxPercentage' => '21', 'DiscountPercentage' => '0', 'Periods' => '1', 'Periodic' => 'j', 'StartPeriod' => '2018-07-13', 'EndPeriod' => '2019-07-13', 'NextDate' => '2018-06-29', 'ContractPeriods' => '1', 'ContractPeriodic' => 'j', 'StartContract' => '2018-07-13', 'EndContract' => '2018-07-13', 'TerminationDate' => '2019-07-13', 'Reminder' => '', 'InvoiceAuthorisation' => 'yes', 'AmountExcl' => '15', 'AmountIncl' => '18.15'], 'Termination' => ['Date' => '2019-07-13', 'Created' => '2019-05-20 12:00:00', 'Status' => 'pending'], 'Translations' => ['RegistrarName' => 'Example registrar', 'Status' => 'Wachten op actie']]], $domain);
    }

    /** @test */
    public function it_can_transfer_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"transfer","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De domeinnaam example.com is geregistreerd"]}')
        );

        $domain = $this->hostFact->domains()->transfer([
            'Domain' => 'example',
            'Tld' => 'com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'transfer', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De domeinnaam example.com is geregistreerd']], $domain);
    }

    /** @test */
    public function it_can_unlock_an_existing_domain()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"domain","action":"unlock","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De domeinnaam dnsexample.com is geunlocked"]}')
        );

        $domain = $this->hostFact->domains()->unlock([
            'Domain' => 'dnsexample',
            'Tld' => 'com'
        ]);

        $this->assertSame(['controller' => 'domain', 'action' => 'unlock', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De domeinnaam dnsexample.com is geunlocked']], $domain);
    }
}