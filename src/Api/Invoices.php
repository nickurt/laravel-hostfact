<?php

namespace nickurt\HostFact\Api;

class Invoices extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/facturen/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/attachment-add
     * @see https://www.hostfact.nl/developer/api/facturen/attachment-delete
     * @see https://www.hostfact.nl/developer/api/facturen/attachment-download
     * @return Attachments
     */
    public function attachments()
    {
        return new \nickurt\HostFact\Api\Attachments($this->client);
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/block
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function block($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'block'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/cancelschedule
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelSchedule($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'cancelschedule'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/credit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function credit($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'credit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/download
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function download($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'download'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/invoiceline-add
     * @see https://www.hostfact.nl/developer/api/facturen/invoiceline-delete
     * @return InvoicesLine
     */
    public function line()
    {
        return new \nickurt\HostFact\Api\InvoicesLine($this->client);
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/markaspaid
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function markAsPaid($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'markaspaid'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/markasunpaid
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function markAsUnpaid($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'markasunpaid'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/partpayment
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function partPayment($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'partpayment'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/paymentprocesspause
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function paymentProcessPause($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'paymentprocesspause'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/paymentprocessreactivate
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function paymentProcessReactivate($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'paymentprocessreactivate'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/schedule
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function schedule($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'schedule'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/sendbyemail
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendByEmail($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'sendbyemail'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/sendreminderbyemail
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendReminderByEmail($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'sendreminderbyemail'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/sendsummationbyemail
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendSummationByEmail($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'sendsummationbyemail'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'show'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/facturen/unblock
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function unblock($params)
    {
        return $this->post(array_merge(['controller' => 'invoice', 'action' => 'unblock'], $params));
    }
}