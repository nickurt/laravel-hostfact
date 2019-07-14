<?php

namespace nickurt\HostFact\Tests\Endpoints;

class TicketsTest extends BaseEndpointTest
{
    /** @test */
    public function it_can_add_a_message_to_an_existing_ticket()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"ticket","action":"addmessage","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Bericht is toegevoegd aan ticket T20180001"],"ticket":{"Identifier":"1","TicketID":"T20180001","Debtor":"1","DebtorCode":"DB0001","EmailAddress":"info@company.com","CC":"","Type":"ticket","Date":"2018-01-14 15:08:04","Subject":"Ticket test","Owner":"1","Priority":"0","Status":"1","Comment":"","Number":"3","LastDate":"2019-05-17 11:48:30","LastName":"Employee - Company X -","TicketMessages":[{"Identifier":"3","Date":"2019-05-17 11:48:30","Subject":"Ticket test","Attachments":"","Base64Message":"U2Vjb25kIG1lc3NhZ2UgdG8gdGlja2V0","SenderID":"0","SenderName":"Employee - Company X","SenderEmail":""},{"Identifier":"2","Date":"2018-09-13 16:24:50","Subject":"Ticket test","Attachments":[{"name":"example.txt","location":"documents/tickets/T20180001/example.txt","type":"unknown","extension":"txt","filesize":"0.0400390625"}],"Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"},{"Identifier":"1","Date":"2018-01-14 15:08:04","Subject":"Ticket test","Attachments":"","Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"}],"Translations":{"Status":"Open","Priority":"Normaal"}}}')
        );

        $ticket = $this->hostFact->tickets()->addMessage([
            'TicketID' => 'T20180001',
            'TicketMessages' => [
                [
                    'SenderName' => 'Employee - Company X',
                    'Message' => 'Second message to ticket'
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'ticket', 'action' => 'addmessage', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Bericht is toegevoegd aan ticket T20180001'], 'ticket' => ['Identifier' => '1', 'TicketID' => 'T20180001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'EmailAddress' => 'info@company.com', 'CC' => '', 'Type' => 'ticket', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Ticket test', 'Owner' => '1', 'Priority' => '0', 'Status' => '1', 'Comment' => '', 'Number' => '3', 'LastDate' => '2019-05-17 11:48:30', 'LastName' => 'Employee - Company X -', 'TicketMessages' => [0 => ['Identifier' => '3', 'Date' => '2019-05-17 11:48:30', 'Subject' => 'Ticket test', 'Attachments' => '', 'Base64Message' => 'U2Vjb25kIG1lc3NhZ2UgdG8gdGlja2V0', 'SenderID' => '0', 'SenderName' => 'Employee - Company X', 'SenderEmail' => ''], 1 => ['Identifier' => '2', 'Date' => '2018-09-13 16:24:50', 'Subject' => 'Ticket test', 'Attachments' => [0 => ['name' => 'example.txt', 'location' => 'documents/tickets/T20180001/example.txt', 'type' => 'unknown', 'extension' => 'txt', 'filesize' => '0.0400390625']], 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl'], 2 => ['Identifier' => '1', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Ticket test', 'Attachments' => '', 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl']], 'Translations' => ['Status' => 'Open', 'Priority' => 'Normaal']]], $ticket);
    }

    /** @test */
    public function it_can_add_a_new_ticket()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"ticket","action":"add","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Ticket T20190001 is aangemaakt","Bericht is toegevoegd aan ticket T20190001"],"ticket":{"Identifier":"2","TicketID":"T20190001","Debtor":"1","DebtorCode":"DB0001","EmailAddress":"info@company.com","CC":"","Type":"ticket","Date":"2019-05-17 11:47:50","Subject":"New ticket","Owner":"0","Priority":"0","Status":"0","Comment":"","Number":"1","LastDate":"2019-05-17 11:47:50","LastName":"Customer X -","TicketMessages":[{"Identifier":"3","Date":"2019-05-17 11:47:50","Subject":"New ticket","Attachments":"","Base64Message":"QVBJOiA8YnIgLz4gRXhhbXBsZSB0aWNrZXQsIGFkZGVkIGJ5IEFQSS4=","SenderID":"0","SenderName":"Customer X","SenderEmail":""}],"Translations":{"Status":"Nieuw bericht","Priority":"Normaal"}}}')
        );

        $ticket = $this->hostFact->tickets()->add([
            'Debtor' => '1',
            'Subject' => 'New ticket',
            'TicketMessages' => [
                [
                    'SenderName' => 'Customer X',
                    'Message' => 'API: <br /> Example ticket, added by API.'
                ]
            ]
        ]);

        $this->assertSame(['controller' => 'ticket', 'action' => 'add', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Ticket T20190001 is aangemaakt', 1 => 'Bericht is toegevoegd aan ticket T20190001'], 'ticket' => ['Identifier' => '2', 'TicketID' => 'T20190001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'EmailAddress' => 'info@company.com', 'CC' => '', 'Type' => 'ticket', 'Date' => '2019-05-17 11:47:50', 'Subject' => 'New ticket', 'Owner' => '0', 'Priority' => '0', 'Status' => '0', 'Comment' => '', 'Number' => '1', 'LastDate' => '2019-05-17 11:47:50', 'LastName' => 'Customer X -', 'TicketMessages' => [0 => ['Identifier' => '3', 'Date' => '2019-05-17 11:47:50', 'Subject' => 'New ticket', 'Attachments' => '', 'Base64Message' => 'QVBJOiA8YnIgLz4gRXhhbXBsZSB0aWNrZXQsIGFkZGVkIGJ5IEFQSS4=', 'SenderID' => '0', 'SenderName' => 'Customer X', 'SenderEmail' => '']], 'Translations' => ['Status' => 'Nieuw bericht', 'Priority' => 'Normaal']]], $ticket);
    }

    /** @test */
    public function it_can_change_owner_of_an_existing_ticket()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"ticket","action":"changeowner","status":"success","date":"2019-05-20T12:00:00+02:00","ticket":{"Identifier":"1","TicketID":"T20180001","Debtor":"1","DebtorCode":"DB0001","EmailAddress":"info@company.com","CC":"","Type":"ticket","Date":"2018-01-14 15:08:04","Subject":"Ticket test","Owner":"2","Priority":"0","Status":"1","Comment":"","Number":"2","LastDate":"2018-09-13 16:24:50","LastName":"HostFact - HostFact","TicketMessages":[{"Identifier":"2","Date":"2018-09-13 16:24:50","Subject":"Ticket test","Attachments":[{"name":"example.txt","location":"documents/tickets/T20180001/example.txt","type":"unknown","extension":"txt","filesize":"0.0400390625"}],"Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"},{"Identifier":"1","Date":"2018-01-14 15:08:04","Subject":"Ticket test","Attachments":"","Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"}],"Translations":{"Status":"Open","Priority":"Normaal"}}}')
        );

        $ticket = $this->hostFact->tickets()->changeOwner([
            'TicketID' => 'T20180001',
            'Owner' => 2
        ]);

        $this->assertSame(['controller' => 'ticket', 'action' => 'changeowner', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'ticket' => ['Identifier' => '1', 'TicketID' => 'T20180001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'EmailAddress' => 'info@company.com', 'CC' => '', 'Type' => 'ticket', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Ticket test', 'Owner' => '2', 'Priority' => '0', 'Status' => '1', 'Comment' => '', 'Number' => '2', 'LastDate' => '2018-09-13 16:24:50', 'LastName' => 'HostFact - HostFact', 'TicketMessages' => [0 => ['Identifier' => '2', 'Date' => '2018-09-13 16:24:50', 'Subject' => 'Ticket test', 'Attachments' => [0 => ['name' => 'example.txt', 'location' => 'documents/tickets/T20180001/example.txt', 'type' => 'unknown', 'extension' => 'txt', 'filesize' => '0.0400390625']], 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl'], 1 => ['Identifier' => '1', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Ticket test', 'Attachments' => '', 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl']], 'Translations' => ['Status' => 'Open', 'Priority' => 'Normaal']]], $ticket);
    }

    /** @test */
    public function it_can_change_status_of_an_existing_ticket()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"ticket","action":"changestatus","status":"success","date":"2019-05-20T12:00:00+02:00","ticket":{"Identifier":"1","TicketID":"T20180001","Debtor":"1","DebtorCode":"DB0001","EmailAddress":"info@company.com","CC":"","Type":"ticket","Date":"2018-01-14 15:08:04","Subject":"Ticket test","Owner":"1","Priority":"0","Status":"3","Comment":"","Number":"2","LastDate":"2018-09-13 16:24:50","LastName":"HostFact - HostFact","TicketMessages":[{"Identifier":"2","Date":"2018-09-13 16:24:50","Subject":"Ticket test","Attachments":[{"name":"example.txt","location":"documents/tickets/T20180001/example.txt","type":"unknown","extension":"txt","filesize":"0.0400390625"}],"Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"},{"Identifier":"1","Date":"2018-01-14 15:08:04","Subject":"Ticket test","Attachments":"","Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"}],"Translations":{"Status":"Gesloten","Priority":"Normaal"}}}')
        );

        $ticket = $this->hostFact->tickets()->changeStatus([
            'TicketID' => 'T20180001',
            'Status' => 3
        ]);

        $this->assertSame(['controller' => 'ticket', 'action' => 'changestatus', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'ticket' => ['Identifier' => '1', 'TicketID' => 'T20180001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'EmailAddress' => 'info@company.com', 'CC' => '', 'Type' => 'ticket', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Ticket test', 'Owner' => '1', 'Priority' => '0', 'Status' => '3', 'Comment' => '', 'Number' => '2', 'LastDate' => '2018-09-13 16:24:50', 'LastName' => 'HostFact - HostFact', 'TicketMessages' => [0 => ['Identifier' => '2', 'Date' => '2018-09-13 16:24:50', 'Subject' => 'Ticket test', 'Attachments' => [0 => ['name' => 'example.txt', 'location' => 'documents/tickets/T20180001/example.txt', 'type' => 'unknown', 'extension' => 'txt', 'filesize' => '0.0400390625']], 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl'], 1 => ['Identifier' => '1', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Ticket test', 'Attachments' => '', 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl']], 'Translations' => ['Status' => 'Gesloten', 'Priority' => 'Normaal']]], $ticket);
    }

    /** @test */
    public function it_can_delete_an_existing_ticket()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"ticket","action":"delete","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Ticket T20180001 is verwijderd"]}')
        );

        $ticket = $this->hostFact->tickets()->delete([
            'TicketID' => 'T20180001'
        ]);

        $this->assertSame(['controller' => 'ticket', 'action' => 'delete', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Ticket T20180001 is verwijderd']], $ticket);
    }

    /** @test */
    public function it_can_download_an_attachment_of_an_existing_ticket()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"attachment","action":"download","status":"success","date":"2019-05-20T12:00:00+02:00","success":["example.txt","VGhpcyBpcyBhbiBleGFtcGxlIGZpbGUgd2l0aCBzb21lIGNvbnRlbnQ="]}')
        );

        $ticket = $this->hostFact->tickets()->attachments()->download([
            'TicketID' => 'T20180001',
            'Type' => 'ticket',
            'Filename' => 'example.txt'
        ]);

        $this->assertSame(['controller' => 'attachment', 'action' => 'download', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'example.txt', 1 => 'VGhpcyBpcyBhbiBleGFtcGxlIGZpbGUgd2l0aCBzb21lIGNvbnRlbnQ=']], $ticket);
    }

    /** @test */
    public function it_can_edit_an_existing_ticket()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"ticket","action":"edit","status":"success","date":"2019-05-20T12:00:00+02:00","success":["Ticket T20180001 is bewerkt"],"ticket":{"Identifier":"1","TicketID":"T20180001","Debtor":"1","DebtorCode":"DB0001","EmailAddress":"info@company.com","CC":"","Type":"ticket","Date":"2018-01-14 15:08:04","Subject":"Change subject of new ticket","Owner":"1","Priority":"0","Status":"1","Comment":"","Number":"2","LastDate":"2018-09-13 16:24:50","LastName":"HostFact - HostFact","TicketMessages":[{"Identifier":"2","Date":"2018-09-13 16:24:50","Subject":"Ticket test","Attachments":[{"name":"example.txt","location":"documents/tickets/T20180001/example.txt","type":"unknown","extension":"txt","filesize":"0"}],"Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"},{"Identifier":"1","Date":"2018-01-14 15:08:04","Subject":"Ticket test","Attachments":"","Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"}],"Translations":{"Status":"Open","Priority":"Normaal"}}}')
        );

        $ticket = $this->hostFact->tickets()->edit([
            'TicketID' => 'T20180001',
            'Subject' => 'Change subject of new ticket'
        ]);

        $this->assertSame(['controller' => 'ticket', 'action' => 'edit', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'success' => [0 => 'Ticket T20180001 is bewerkt'], 'ticket' => ['Identifier' => '1', 'TicketID' => 'T20180001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'EmailAddress' => 'info@company.com', 'CC' => '', 'Type' => 'ticket', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Change subject of new ticket', 'Owner' => '1', 'Priority' => '0', 'Status' => '1', 'Comment' => '', 'Number' => '2', 'LastDate' => '2018-09-13 16:24:50', 'LastName' => 'HostFact - HostFact', 'TicketMessages' => [0 => ['Identifier' => '2', 'Date' => '2018-09-13 16:24:50', 'Subject' => 'Ticket test', 'Attachments' => [0 => ['name' => 'example.txt', 'location' => 'documents/tickets/T20180001/example.txt', 'type' => 'unknown', 'extension' => 'txt', 'filesize' => '0']], 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl'], 1 => ['Identifier' => '1', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Ticket test', 'Attachments' => '', 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl']], 'Translations' => ['Status' => 'Open', 'Priority' => 'Normaal']]], $ticket);
    }

    /** @test */
    public function it_can_get_all_the_tickets()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"ticket","action":"list","status":"success","date":"2019-05-20T12:00:00+02:00","totalresults":"1","currentresults":"1","offset":"0","tickets":[{"Identifier":"1","TicketID":"T20180001","Number":"2","Debtor":"1","CompanyName":"Company X","Initials":"John","SurName":"Jackson","Subject":"Ticket test","Owner":"1","LastDate":"2018-09-13 16:24:50","Priority":"0","Status":"1"}]}')
        );

        $tickets = $this->hostFact->tickets()->list([// 'searchfor' => 'New ticket'
        ]);

        $this->assertSame(['controller' => 'ticket', 'action' => 'list', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'totalresults' => '1', 'currentresults' => '1', 'offset' => '0', 'tickets' => [0 => ['Identifier' => '1', 'TicketID' => 'T20180001', 'Number' => '2', 'Debtor' => '1', 'CompanyName' => 'Company X', 'Initials' => 'John', 'SurName' => 'Jackson', 'Subject' => 'Ticket test', 'Owner' => '1', 'LastDate' => '2018-09-13 16:24:50', 'Priority' => '0', 'Status' => '1']]], $tickets);
    }

    /** @test */
    public function it_can_show_an_ticket()
    {
        $this->mockApiClientResponse(
            new \GuzzleHttp\Psr7\Response(200, [], '{"controller":"ticket","action":"show","status":"success","date":"2019-05-20T12:00:00+02:00","ticket":{"Identifier":"1","TicketID":"T20180001","Debtor":"1","DebtorCode":"DB0001","EmailAddress":"info@company.com","CC":"","Type":"ticket","Date":"2018-01-14 15:08:04","Subject":"Ticket test","Owner":"1","Priority":"0","Status":"1","Comment":"","Number":"2","LastDate":"2018-09-13 16:24:50","LastName":"HostFact - HostFact","TicketMessages":[{"Identifier":"2","Date":"2018-09-13 16:24:50","Subject":"Ticket test","Attachments":[{"name":"example.txt","location":"documents/tickets/T20180001/example.txt","type":"unknown","extension":"txt","filesize":"0"}],"Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"},{"Identifier":"1","Date":"2018-01-14 15:08:04","Subject":"Ticket test","Attachments":"","Base64Message":"PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=","SenderID":"1","SenderName":"HostFact","SenderEmail":"info@hostfact.nl"}],"Translations":{"Status":"Open","Priority":"Normaal"}}}')
        );

        $ticket = $this->hostFact->tickets()->show([
            'TicketID' => 'T20180001'
        ]);

        $this->assertSame(['controller' => 'ticket', 'action' => 'show', 'status' => 'success', 'date' => '2019-05-20T12:00:00+02:00', 'ticket' => ['Identifier' => '1', 'TicketID' => 'T20180001', 'Debtor' => '1', 'DebtorCode' => 'DB0001', 'EmailAddress' => 'info@company.com', 'CC' => '', 'Type' => 'ticket', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Ticket test', 'Owner' => '1', 'Priority' => '0', 'Status' => '1', 'Comment' => '', 'Number' => '2', 'LastDate' => '2018-09-13 16:24:50', 'LastName' => 'HostFact - HostFact', 'TicketMessages' => [0 => ['Identifier' => '2', 'Date' => '2018-09-13 16:24:50', 'Subject' => 'Ticket test', 'Attachments' => [0 => ['name' => 'example.txt', 'location' => 'documents/tickets/T20180001/example.txt', 'type' => 'unknown', 'extension' => 'txt', 'filesize' => '0']], 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PldpdGggYSByZXNwb25zZTwvYm9keT4NCjwvaHRtbD4NCg==', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl'], 1 => ['Identifier' => '1', 'Date' => '2018-01-14 15:08:04', 'Subject' => 'Ticket test', 'Attachments' => '', 'Base64Message' => 'PGh0bWw+DQo8aGVhZD4NCgk8dGl0bGU+PC90aXRsZT4NCjwvaGVhZD4NCjxib2R5PkhlbGxvLCB0aGlzIGlzIGEgdGlja2V0IHRlc3Q8L2JvZHk+DQo8L2h0bWw+DQo=', 'SenderID' => '1', 'SenderName' => 'HostFact', 'SenderEmail' => 'info@hostfact.nl']], 'Translations' => ['Status' => 'Open', 'Priority' => 'Normaal']]], $ticket);
    }
}