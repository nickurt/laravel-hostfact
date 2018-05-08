<?php

namespace nickurt\HostFact\Api;

class Debtors extends AbstractApi
{
    public function add($params)
    {
        //
    }

    public function attachmentAdd($params)
    {
        //
    }

    public function attachmentDelete($params)
    {
        //
    }

    public function attachmentDownload($params)
    {
        //
    }

    public function checkLogin($params)
    {
        //
    }

    public function edit($params)
    {
        //
    }

    public function generatePdf($params)
    {
        //
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'list'], $params));
    }

    public function sendEmail($params)
    {
        //
    }

    public function show($params)
    {
        //
    }

    public function updateLoginCredentials($params)
    {
        //
    }
}