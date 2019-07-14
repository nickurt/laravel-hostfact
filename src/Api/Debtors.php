<?php

namespace nickurt\HostFact\Api;

class Debtors extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/debiteuren/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/debiteuren/attachment-add
     * @see https://www.hostfact.nl/developer/api/debiteuren/attachment-delete
     * @see https://www.hostfact.nl/developer/api/debiteuren/attachment-download
     * @return Attachments
     */
    public function attachments()
    {
        return new \nickurt\HostFact\Api\Attachments($this->client);
    }

    /**
     * @see https://www.hostfact.nl/developer/api/debiteuren/checklogin
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkLogin($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'checkLogin'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/debiteuren/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/debiteuren/generatepdf
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generatePdf($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'generatepdf'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/debiteuren/list
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params = [])
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/debiteuren/sendemail
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendEmail($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'sendemail'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/debiteuren/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'show'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/debiteuren/updatelogincredentials
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateLoginCredentials($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'updatelogincredentials'], $params));
    }
}