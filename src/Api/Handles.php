<?php

namespace nickurt\HostFact\Api;

class Handles extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/domein-contacten/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'handle', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domein-contacten/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'handle', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domein-contacten/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'handle', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domein-contacten/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'handle', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domein-contacten/listdomain
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listDomain($params)
    {
        return $this->post(array_merge(['controller' => 'handle', 'action' => 'listdomain'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domein-contacten/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'handle', 'action' => 'show'], $params));
    }
}