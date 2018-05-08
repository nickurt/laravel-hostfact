<?php

namespace nickurt\HostFact\Api;

class Vps extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'add'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'create'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function downloadAccountData($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'downloadaccountdata'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'edit'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'list'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function pause($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'pause'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function restart($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'restart'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendAccountDataByEmail($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'sendaccountdatabyemail'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'show'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function start($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'start'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function suspend($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'suspend'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function terminate($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'terminate'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function unsuspend($params)
    {
        return $this->post(array_merge(['controller' => 'vps', 'action' => 'unsuspend'], $params));
    }
}