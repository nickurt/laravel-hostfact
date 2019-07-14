<?php

namespace nickurt\HostFact\Api;

class Hosting extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/hosting/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/create
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'create'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/getdomainlist
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDomainList($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'getdomainlist'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/removefromserver
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function removeFromServer($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'removefromserver'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/sendaccountinfobyemail
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendAccountInfoByEmail($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'sendaccountinfobyemail'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'show'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/suspend
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function suspend($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'suspend'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/terminate
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function terminate($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'terminate'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/unsuspend
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function unsuspend($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'unsuspend'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/hosting/updowngrade
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function upDownGrade($params)
    {
        return $this->post(array_merge(['controller' => 'hosting', 'action' => 'updowngrade'], $params));
    }
}