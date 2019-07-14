<?php

namespace nickurt\HostFact\Api;

class CreditInvoices extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'creditinvoice', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/attachment-add
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/attachment-delete
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/attachment-download
     * @return Attachments
     */
    public function attachments()
    {
        return new \nickurt\HostFact\Api\Attachments($this->client);
    }

    /**
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'creditinvoice', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'creditinvoice', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/creditinvoiceline-add
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/creditinvoiceline-delete
     * @return CreditInvoicesLine
     */
    public function line()
    {
        return new \nickurt\HostFact\Api\CreditInvoicesLine($this->client);
    }

    /**
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'creditinvoice', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/markaspaid
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function markAsPaid($params)
    {
        return $this->post(array_merge(['controller' => 'creditinvoice', 'action' => 'markaspaid'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/partpayment
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function partPayment($params)
    {
        return $this->post(array_merge(['controller' => 'creditinvoice', 'action' => 'partpayment'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/inkoopfacturen/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'creditinvoice', 'action' => 'show'], $params));
    }
}