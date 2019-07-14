<?php

namespace nickurt\HostFact\Api;

class OrdersLine extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/bestellingen/orderline-add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'orderline', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/bestellingen/orderline-delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'orderline', 'action' => 'delete'], $params));
    }
}