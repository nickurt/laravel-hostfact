<?php

namespace nickurt\HostFact\Api;

class Debtors extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'add'], $params));
    }

    /**
     * @return Attachments
     */
    public function attachments()
    {
        return new \nickurt\HostFact\Api\Attachments($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkLogin($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'checkLogin'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'edit'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generatePdf($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'generatepdf'], $params));
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

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendEmail($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'sendemail'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'show'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateLoginCredentials($params)
    {
        return $this->post(array_merge(['controller' => 'debtor', 'action' => 'updatelogincredentials'], $params));
    }
}