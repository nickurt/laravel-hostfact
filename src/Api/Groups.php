<?php

namespace nickurt\HostFact\Api;

class Groups extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/groepen/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'group', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/groepen/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'group', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/groepen/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'group', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/groepen/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'group', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/groepen/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'group', 'action' => 'show'], $params));
    }
}