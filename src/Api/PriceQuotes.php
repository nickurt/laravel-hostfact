<?php

namespace nickurt\HostFact\Api;

class PriceQuotes extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/offertes/accept
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function accept($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'accept'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/attachment-add
     * @see https://www.hostfact.nl/developer/api/offertes/attachment-delete
     * @see https://www.hostfact.nl/developer/api/offertes/attachment-download
     * @return Attachments
     */
    public function attachments()
    {
        return new \nickurt\HostFact\Api\Attachments($this->client);
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/decline
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function decline($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'decline'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/download
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function download($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'download'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/pricequoteline-add
     * @see https://www.hostfact.nl/developer/api/offertes/pricequoteline-delete
     * @return PriceQuotesLine
     */
    public function line()
    {
        return new \nickurt\HostFact\Api\PriceQuotesLine($this->client);
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/sendbyemail
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendByEmail($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'sendbyemail'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/offertes/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'show'], $params));
    }
}