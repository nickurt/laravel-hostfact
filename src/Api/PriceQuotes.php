<?php

namespace nickurt\HostFact\Api;

class PriceQuotes extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function accept($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'accept'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'add'], $params));
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
     * @throws \Http\Client\Exception
     */
    public function decline($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'decline'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'delete'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function download($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'download'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'edit'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'list'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function sendByEmail($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'sendbyemail'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'pricequote', 'action' => 'show'], $params));
    }
}