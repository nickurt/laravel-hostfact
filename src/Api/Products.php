<?php

namespace nickurt\HostFact\Api;

class Products extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/producten/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'product', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/producten/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'product', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/producten/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'product', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/producten/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'product', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/producten/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'product', 'action' => 'show'], $params));
    }
}