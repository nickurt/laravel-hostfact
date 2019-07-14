<?php

namespace nickurt\HostFact\Api;

class Domains extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/autorenew
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function autoRenew($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'autorenew'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/changenameserver
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeNameServer($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'changenameserver'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/check
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function check($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'check'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/editdnszone
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function editDnsZone($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'editdnszone'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/editwhois
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function editWhois($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'editwhois'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/getdnszone
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDnsZone($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'getdnszone'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/gettoken
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getToken($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'gettoken'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/listdnstemplates
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listDnsTemplates($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'listdnstemplates'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/lock
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function lock($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'lock'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/register
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function register($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'register'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'show'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/syncwhois
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function syncWhois($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'syncwhois'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/terminate
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function terminate($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'terminate'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/transfer
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function transfer($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'transfer'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/domeinnamen/unlock
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function unlock($params)
    {
        return $this->post(array_merge(['controller' => 'domain', 'action' => 'unlock'], $params));
    }
}