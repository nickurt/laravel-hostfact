<?php

namespace nickurt\HostFact\Api;

class Domains extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'add'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function autoRenew($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'autorenew'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function changeNameServer($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'changenameserver'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function check($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'check'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'delete'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'edit'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function editDnsZone($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'editdnszone'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function editWhois($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'editwhois'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function getDnsZone($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'getdnszone'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function getToken($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'gettoken'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'list'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function listDnsTemplates($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'listdnstemplates'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function lock($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'lock'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function register($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'register'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'show'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function syncWhois($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'syncwhois'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function terminate($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'terminate'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function transfer($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'transfer'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function unlock($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'unlock'], $params));
    }
}