<?php

namespace nickurt\HostFact\Api;

class Orders extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/bestellingen/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'order', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/bestellingen/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'order', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/bestellingen/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'order', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/bestellingen/orderline-add
     * @see https://www.hostfact.nl/developer/api/bestellingen/orderline-delete
     * @return OrdersLine
     */
    public function line()
    {
        return new \nickurt\HostFact\Api\OrdersLine($this->client);
    }

    /**
     * @see https://www.hostfact.nl/developer/api/bestellingen/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'order', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/bestellingen/process
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function process($params)
    {
        return $this->post(array_merge(['controller' => 'order', 'action' => 'process'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/bestellingen/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'order', 'action' => 'show'], $params));
    }
}