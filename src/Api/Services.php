<?php

namespace nickurt\HostFact\Api;

class Services extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/overige-diensten/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'service', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/overige-diensten/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'service', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/overige-diensten/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'service', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/overige-diensten/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'service', 'action' => 'show'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/overige-diensten/terminate
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function terminate($params)
    {
        return $this->post(array_merge(['controller' => 'service', 'action' => 'terminate'], $params));
    }
}