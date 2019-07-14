<?php

namespace nickurt\HostFact\Tests\Endpoints;

class DebtorsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_new_debtor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"debtor","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Debiteur \'DB0002\' is aangemaakt"],"debtor":{"Identifier":"2","DebtorCode":"DB0002","CompanyName":"Company X","CompanyNumber":"123456789","LegalForm":"","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PhoneNumber":"010 - 22 33 44","MobileNumber":"","FaxNumber":"","Website":"","Comment":"","InvoiceMethod":"0","InvoiceCompanyName":"","InvoiceSex":"m","InvoiceInitials":"","InvoiceSurName":"","InvoiceAddress":"","InvoiceZipCode":"","InvoiceCity":"","InvoiceCountry":"NL","InvoiceEmailAddress":"","InvoiceAuthorisation":"no","MandateID":"","InvoiceDataForPriceQuote":"no","AccountNumber":"NL59RABO0123123123","AccountBIC":"RABONL2U","AccountName":"Company X","AccountBank":"Rabobank","AccountCity":"Amsterdam","ActiveLogin":"yes","Username":"DB0002","SecurePassword":"","Mailing":"yes","Taxable":"auto","PeriodicInvoiceDays":"-1","InvoiceTemplate":"0","PriceQuoteTemplate":"0","ReminderTemplate":"0","SecondReminderTemplate":"-1","SummationTemplate":"0","PaymentMail":"-1","PaymentMailTemplate":"0","InvoiceCollect":"-1","DefaultLanguage":"","ClientareaProfile":"0","Groups":{"4":{"id":"4","GroupName":"Hosting clients"}},"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"LegalForm":"","Country":"Nederland","InvoiceMethod":"Per e-mail","InvoiceCountry":"Nederland","Taxable":"Automatisch","DefaultLanguage":""}}}')
        );

        $debtor = $this->hostFact->debtors()->add([
            // 'DebtorCode' => 'DB0001',
            'CompanyName' => 'Company X',
            'CompanyNumber' => '123456789',
            'TaxNumber' => 'NL123456789B01',
            'Sex' => 'm',
            'Initials' => 'John',
            'SurName' => 'Jackson',
            'Address' => 'Keizersgracht 100',
            'ZipCode' => '1015 AA',
            'City' => 'Amsterdam',
            'Country' => 'NL',
            'EmailAddress' => 'info@company.com',
            'PhoneNumber' => '010 - 22 33 44',
            'AccountNumber' => 'NL59RABO0123123123',
            'AccountBIC' => 'RABONL2U',
            'AccountName' => 'Company X',
            'AccountBank' => 'Rabobank',
            'AccountCity' => 'Amsterdam',
            'Groups' => ['4']
        ]);

        $this->assertSame(['controller' => 'debtor', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Debiteur \'DB0002\' is aangemaakt'], 'debtor' => ['Identifier' => '2', 'DebtorCode' => 'DB0002', 'CompanyName' => 'Company X', 'CompanyNumber' => '123456789', 'LegalForm' => '', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PhoneNumber' => '010 - 22 33 44', 'MobileNumber' => '', 'FaxNumber' => '', 'Website' => '', 'Comment' => '', 'InvoiceMethod' => '0', 'InvoiceCompanyName' => '', 'InvoiceSex' => 'm', 'InvoiceInitials' => '', 'InvoiceSurName' => '', 'InvoiceAddress' => '', 'InvoiceZipCode' => '', 'InvoiceCity' => '', 'InvoiceCountry' => 'NL', 'InvoiceEmailAddress' => '', 'InvoiceAuthorisation' => 'no', 'MandateID' => '', 'InvoiceDataForPriceQuote' => 'no', 'AccountNumber' => 'NL59RABO0123123123', 'AccountBIC' => 'RABONL2U', 'AccountName' => 'Company X', 'AccountBank' => 'Rabobank', 'AccountCity' => 'Amsterdam', 'ActiveLogin' => 'yes', 'Username' => 'DB0002', 'SecurePassword' => '', 'Mailing' => 'yes', 'Taxable' => 'auto', 'PeriodicInvoiceDays' => '-1', 'InvoiceTemplate' => '0', 'PriceQuoteTemplate' => '0', 'ReminderTemplate' => '0', 'SecondReminderTemplate' => '-1', 'SummationTemplate' => '0', 'PaymentMail' => '-1', 'PaymentMailTemplate' => '0', 'InvoiceCollect' => '-1', 'DefaultLanguage' => '', 'ClientareaProfile' => '0', 'Groups' => [4 => ['id' => '4', 'GroupName' => 'Hosting clients']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['LegalForm' => '', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'InvoiceCountry' => 'Nederland', 'Taxable' => 'Automatisch', 'DefaultLanguage' => '']]], $debtor);
    }

    /** @test */
    public function it_can_add_an_attachement_to_an_existing_debtor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de debiteur"]}')
        );

        $debtor = $this->hostFact->debtors()->attachments()->add([
            'DebtorCode' => 'DB0001',
            'Type' => 'debtor',
            'Filename' => 'sample.pdf',
            'Base64' => 'JVBERi0xLj...UlRU9GDQ=='
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Het bestand \'sample.pdf\' is toegevoegd als bijlage bij de debiteur']], $debtor);
    }

    /** @test */
    public function it_can_check_login_of_an_existing_debtor()
    {
        $this->markTestIncomplete('Missing ApiClient Response ..');

        $debtor = $this->hostFact->debtors()->checkLogin([
            'Username' => 'DB0001',
            'Password' => '3e5cd56E'
        ]);
    }

    /** @test */
    public function it_can_delete_an_attachement_of_an_existing_debtor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De bijlage \'sample.pdf\' is verwijderd"]}')
        );

        $debtor = $this->hostFact->debtors()->attachments()->delete([
            'DebtorCode' => 'DB0001',
            'Type' => 'debtor',
            'Filename' => 'sample.pdf'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De bijlage \'sample.pdf\' is verwijderd']], $debtor);
    }

    /** @test */
    public function it_can_download_an_attachement_of_an_existing_debtor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"download","status":"success","date":"2019-05-20T12:00:00+02:00","success":["sample.pdf","JVBERi0xLj...olJUVPRg=="]}')
        );

        $debtor = $this->hostFact->debtors()->attachments()->download([
            'DebtorCode' => 'DB0001',
            'Type' => 'debtor',
            'Filename' => 'sample.pdf'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'download', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'sample.pdf', 1 => 'JVBERi0xLj...olJUVPRg==']], $debtor);
    }

    /** @test */
    public function it_can_edit_an_existing_debtor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"debtor","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Debiteur \'DB0001\' is bewerkt"],"debtor":{"Identifier":"1","DebtorCode":"DB0001","CompanyName":"Company Y","CompanyNumber":"123456789","LegalForm":"ANDERS","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PhoneNumber":"010 - 22 33 44","MobileNumber":"","FaxNumber":"","Website":"","Comment":"","InvoiceMethod":"0","InvoiceCompanyName":"","InvoiceSex":"m","InvoiceInitials":"","InvoiceSurName":"","InvoiceAddress":"","InvoiceZipCode":"","InvoiceCity":"","InvoiceCountry":"NL","InvoiceEmailAddress":"","InvoiceAuthorisation":"no","MandateID":"","InvoiceDataForPriceQuote":"no","AccountNumber":"NL59RABO0123123123","AccountBIC":"RABONL2U","AccountName":"Company Y","AccountBank":"Rabobank","AccountCity":"Amsterdam","ActiveLogin":"yes","Username":"DB0001","SecurePassword":"","Mailing":"yes","Taxable":"auto","PeriodicInvoiceDays":"-1","InvoiceTemplate":"0","PriceQuoteTemplate":"0","ReminderTemplate":"0","SecondReminderTemplate":"-1","SummationTemplate":"0","PaymentMail":"-1","PaymentMailTemplate":"0","InvoiceCollect":"-1","DefaultLanguage":"","ClientareaProfile":"0","Groups":{"4":{"id":"4","GroupName":"Hosting clients"}},"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"LegalForm":"Anders of onbekend","Country":"Nederland","InvoiceMethod":"Per e-mail","InvoiceCountry":"Nederland","Taxable":"Automatisch","DefaultLanguage":""}}}')
        );

        $debtor = $this->hostFact->debtors()->edit([
            'Identifier' => '1',
            'CompanyName' => 'Company Y',
            'AccountName' => 'Company Y'
        ]);

        $this->assertSame(['controller' => 'debtor', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Debiteur \'DB0001\' is bewerkt'], 'debtor' => ['Identifier' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company Y', 'CompanyNumber' => '123456789', 'LegalForm' => 'ANDERS', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PhoneNumber' => '010 - 22 33 44', 'MobileNumber' => '', 'FaxNumber' => '', 'Website' => '', 'Comment' => '', 'InvoiceMethod' => '0', 'InvoiceCompanyName' => '', 'InvoiceSex' => 'm', 'InvoiceInitials' => '', 'InvoiceSurName' => '', 'InvoiceAddress' => '', 'InvoiceZipCode' => '', 'InvoiceCity' => '', 'InvoiceCountry' => 'NL', 'InvoiceEmailAddress' => '', 'InvoiceAuthorisation' => 'no', 'MandateID' => '', 'InvoiceDataForPriceQuote' => 'no', 'AccountNumber' => 'NL59RABO0123123123', 'AccountBIC' => 'RABONL2U', 'AccountName' => 'Company Y', 'AccountBank' => 'Rabobank', 'AccountCity' => 'Amsterdam', 'ActiveLogin' => 'yes', 'Username' => 'DB0001', 'SecurePassword' => '', 'Mailing' => 'yes', 'Taxable' => 'auto', 'PeriodicInvoiceDays' => '-1', 'InvoiceTemplate' => '0', 'PriceQuoteTemplate' => '0', 'ReminderTemplate' => '0', 'SecondReminderTemplate' => '-1', 'SummationTemplate' => '0', 'PaymentMail' => '-1', 'PaymentMailTemplate' => '0', 'InvoiceCollect' => '-1', 'DefaultLanguage' => '', 'ClientareaProfile' => '0', 'Groups' => [4 => ['id' => '4', 'GroupName' => 'Hosting clients']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['LegalForm' => 'Anders of onbekend', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'InvoiceCountry' => 'Nederland', 'Taxable' => 'Automatisch', 'DefaultLanguage' => '']]], $debtor);
    }

    /** @test */
    public function it_can_generate_pdf_of_an_existing_debtor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"debtor","action":"generatepdf","status":"success","date":"2019-05-20T12:00:00+02:00","debtor":{"Filename":"Gegevens.webhostingpakket.pdf","Base64":"JVBERi0xLj...QKJSVFT0YK"}}')
        );

        $debtor = $this->hostFact->debtors()->generatePdf([
            'Identifier' => 1,
            'TemplateID' => 3,
            'ServiceID' => 1,
            'ServiceType' => 'hosting'
        ]);

        $this->assertSame(['controller' => 'debtor', 'action' => 'generatepdf', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'debtor' => ['Filename' => 'Gegevens.webhostingpakket.pdf', 'Base64' => 'JVBERi0xLj...QKJSVFT0YK']], $debtor);
    }

    /** @test */
    public function it_can_get_all_the_debtors()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"debtor","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"1","currentresults":"1","offset":"0","debtors":[{"Identifier":"1","DebtorCode":"DB0001","CompanyName":"Company X","Sex":"m","Initials":"John","SurName":"Jackson","EmailAddress":"info@company.com","Modified":"2019-05-20 12:00:00"}]}')
        );

        $debtors = $this->hostFact->debtors()->list([
            // 'searchat' => 'EmailAddress|Website',
            // 'searchfor' => 'gmail.com'
        ]);

        $this->assertSame(['controller' => 'debtor', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '1', 'currentresults' => '1', 'offset' => '0', 'debtors' => [0 => ['Identifier' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'EmailAddress' => 'info@company.com', 'Modified' => '2019-05-20 12:00:00']]], $debtors);
    }

    /** @test */
    public function it_can_send_email_to_an_existing_debtor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"debtor","action":"sendemail","status":"success","date":"2019-05-20T12:00:00+02:00","debtors":["E-mail met onderwerp \'Welkom bij HostFact\' is succesvol verzonden naar info@company.com"]}')
        );

        $debtor = $this->hostFact->debtors()->sendEmail([
            'Identifier' => 1,
            'Message' => 'test',
            //'Recipient' => '',
            'TemplateID' => 5,
            //'References' => array('invoice' => 1, 'domain' => 1),
        ]);

        $this->assertSame(['controller' => 'debtor', 'action' => 'sendemail', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'debtors' => [0 => 'E-mail met onderwerp \'Welkom bij HostFact\' is succesvol verzonden naar info@company.com']], $debtor);
    }

    /** @test */
    public function it_can_show_the_debtor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"debtor","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","debtor":{"Identifier":"1","DebtorCode":"DB0001","CompanyName":"Company X","CompanyNumber":"123456789","LegalForm":"ANDERS","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PhoneNumber":"010 - 22 33 44","MobileNumber":"","FaxNumber":"","Website":"","Comment":"","InvoiceMethod":"0","InvoiceCompanyName":"","InvoiceSex":"m","InvoiceInitials":"","InvoiceSurName":"","InvoiceAddress":"","InvoiceZipCode":"","InvoiceCity":"","InvoiceCountry":"NL","InvoiceEmailAddress":"","InvoiceAuthorisation":"no","MandateID":"","InvoiceDataForPriceQuote":"no","AccountNumber":"NL59RABO0123123123","AccountBIC":"RABONL2U","AccountName":"Company X","AccountBank":"Rabobank","AccountCity":"Amsterdam","ActiveLogin":"yes","Username":"DB0001","SecurePassword":"","Mailing":"yes","Taxable":"auto","PeriodicInvoiceDays":"-1","InvoiceTemplate":"0","PriceQuoteTemplate":"0","ReminderTemplate":"0","SecondReminderTemplate":"-1","SummationTemplate":"0","PaymentMail":"-1","PaymentMailTemplate":"0","InvoiceCollect":"-1","DefaultLanguage":"","ClientareaProfile":"0","Groups":{"4":{"id":"4","GroupName":"Hosting clients"}},"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"LegalForm":"Anders of onbekend","Country":"Nederland","InvoiceMethod":"Per e-mail","InvoiceCountry":"Nederland","Taxable":"Automatisch","DefaultLanguage":""}}}')
        );

        $debtor = $this->hostFact->debtors()->show([
            'Identifier' => '1'
        ]);

        $this->assertSame(['controller' => 'debtor', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'debtor' => ['Identifier' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'CompanyNumber' => '123456789', 'LegalForm' => 'ANDERS', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PhoneNumber' => '010 - 22 33 44', 'MobileNumber' => '', 'FaxNumber' => '', 'Website' => '', 'Comment' => '', 'InvoiceMethod' => '0', 'InvoiceCompanyName' => '', 'InvoiceSex' => 'm', 'InvoiceInitials' => '', 'InvoiceSurName' => '', 'InvoiceAddress' => '', 'InvoiceZipCode' => '', 'InvoiceCity' => '', 'InvoiceCountry' => 'NL', 'InvoiceEmailAddress' => '', 'InvoiceAuthorisation' => 'no', 'MandateID' => '', 'InvoiceDataForPriceQuote' => 'no', 'AccountNumber' => 'NL59RABO0123123123', 'AccountBIC' => 'RABONL2U', 'AccountName' => 'Company X', 'AccountBank' => 'Rabobank', 'AccountCity' => 'Amsterdam', 'ActiveLogin' => 'yes', 'Username' => 'DB0001', 'SecurePassword' => '', 'Mailing' => 'yes', 'Taxable' => 'auto', 'PeriodicInvoiceDays' => '-1', 'InvoiceTemplate' => '0', 'PriceQuoteTemplate' => '0', 'ReminderTemplate' => '0', 'SecondReminderTemplate' => '-1', 'SummationTemplate' => '0', 'PaymentMail' => '-1', 'PaymentMailTemplate' => '0', 'InvoiceCollect' => '-1', 'DefaultLanguage' => '', 'ClientareaProfile' => '0', 'Groups' => [4 => ['id' => '4', 'GroupName' => 'Hosting clients']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['LegalForm' => 'Anders of onbekend', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'InvoiceCountry' => 'Nederland', 'Taxable' => 'Automatisch', 'DefaultLanguage' => '']]], $debtor);
    }

    /** @test */
    public function it_can_update_login_credentials_of_an_existing_debtor()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"debtor","action":"updatelogincredentials","status":"success","date":"2019-05-20T12:00:00+02:00","success":["De e-mail met inloggegevens is verzonden naar: info@company.com","De inloggegevens voor debiteur \'DB0001\' zijn gewijzigd"],"debtor":{"Identifier":"1","DebtorCode":"DB0001","CompanyName":"Company X","CompanyNumber":"123456789","LegalForm":"ANDERS","TaxNumber":"NL123456789B01","Sex":"m","Initials":"John","SurName":"Jackson","Address":"Keizersgracht 100","ZipCode":"1015 AA","City":"Amsterdam","Country":"NL","EmailAddress":"info@company.com","PhoneNumber":"010 - 22 33 44","MobileNumber":"","FaxNumber":"","Website":"","Comment":"","InvoiceMethod":"0","InvoiceCompanyName":"","InvoiceSex":"m","InvoiceInitials":"","InvoiceSurName":"","InvoiceAddress":"","InvoiceZipCode":"","InvoiceCity":"","InvoiceCountry":"NL","InvoiceEmailAddress":"","InvoiceAuthorisation":"no","MandateID":"","InvoiceDataForPriceQuote":"no","AccountNumber":"NL59RABO0123123123","AccountBIC":"RABONL2U","AccountName":"Company X","AccountBank":"Rabobank","AccountCity":"Amsterdam","ActiveLogin":"yes","Username":"DB0001","SecurePassword":"","Mailing":"yes","Taxable":"auto","PeriodicInvoiceDays":"-1","InvoiceTemplate":"0","PriceQuoteTemplate":"0","ReminderTemplate":"0","SecondReminderTemplate":"-1","SummationTemplate":"0","PaymentMail":"-1","PaymentMailTemplate":"0","InvoiceCollect":"-1","DefaultLanguage":"","ClientareaProfile":"0","Groups":{"4":{"id":"4","GroupName":"Hosting clients"}},"Created":"2019-05-20 12:00:00","Modified":"2019-05-20 12:00:00","Translations":{"LegalForm":"Anders of onbekend","Country":"Nederland","InvoiceMethod":"Per e-mail","InvoiceCountry":"Nederland","Taxable":"Automatisch","DefaultLanguage":""}}}')
        );

        $debtor = $this->hostFact->debtors()->updateLoginCredentials([
            'Username' => 'DB0001',
            'EmailAddress' => 'info@company.com',
            'Password' => 'newpassword',
            'SendPasswordForgotEmail' => 'yes',
        ]);

        $this->assertSame(['controller' => 'debtor', 'action' => 'updatelogincredentials', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'De e-mail met inloggegevens is verzonden naar: info@company.com', 1 => 'De inloggegevens voor debiteur \'DB0001\' zijn gewijzigd'], 'debtor' => ['Identifier' => '1', 'DebtorCode' => 'DB0001', 'CompanyName' => 'Company X', 'CompanyNumber' => '123456789', 'LegalForm' => 'ANDERS', 'TaxNumber' => 'NL123456789B01', 'Sex' => 'm', 'Initials' => 'John', 'SurName' => 'Jackson', 'Address' => 'Keizersgracht 100', 'ZipCode' => '1015 AA', 'City' => 'Amsterdam', 'Country' => 'NL', 'EmailAddress' => 'info@company.com', 'PhoneNumber' => '010 - 22 33 44', 'MobileNumber' => '', 'FaxNumber' => '', 'Website' => '', 'Comment' => '', 'InvoiceMethod' => '0', 'InvoiceCompanyName' => '', 'InvoiceSex' => 'm', 'InvoiceInitials' => '', 'InvoiceSurName' => '', 'InvoiceAddress' => '', 'InvoiceZipCode' => '', 'InvoiceCity' => '', 'InvoiceCountry' => 'NL', 'InvoiceEmailAddress' => '', 'InvoiceAuthorisation' => 'no', 'MandateID' => '', 'InvoiceDataForPriceQuote' => 'no', 'AccountNumber' => 'NL59RABO0123123123', 'AccountBIC' => 'RABONL2U', 'AccountName' => 'Company X', 'AccountBank' => 'Rabobank', 'AccountCity' => 'Amsterdam', 'ActiveLogin' => 'yes', 'Username' => 'DB0001', 'SecurePassword' => '', 'Mailing' => 'yes', 'Taxable' => 'auto', 'PeriodicInvoiceDays' => '-1', 'InvoiceTemplate' => '0', 'PriceQuoteTemplate' => '0', 'ReminderTemplate' => '0', 'SecondReminderTemplate' => '-1', 'SummationTemplate' => '0', 'PaymentMail' => '-1', 'PaymentMailTemplate' => '0', 'InvoiceCollect' => '-1', 'DefaultLanguage' => '', 'ClientareaProfile' => '0', 'Groups' => [4 => ['id' => '4', 'GroupName' => 'Hosting clients']], 'Created' => '2019-05-20 12:00:00', 'Modified' => '2019-05-20 12:00:00', 'Translations' => ['LegalForm' => 'Anders of onbekend', 'Country' => 'Nederland', 'InvoiceMethod' => 'Per e-mail', 'InvoiceCountry' => 'Nederland', 'Taxable' => 'Automatisch', 'DefaultLanguage' => '']]], $debtor);
    }
}