<?php

namespace nickurt\HostFact\Api;

class Hosting extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'add'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function create($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'create'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'delete'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'edit'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function getDomainList($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'getdomainlist'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'list'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function removeFromServer($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'removefromserver'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function sendAccountInfoByEmail($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'sendaccountinfobyemail'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'show'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function suspend($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'suspend'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function terminate($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'terminate'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function unsuspend($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'unsuspend'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function upDownGrade($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'updowngrade'], $params));
    }
}