<?php

namespace nickurt\HostFact\Api;

class Ssl extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/download
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function download($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'download'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/getstats
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getStatus($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'getstatus'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/installed
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function installed($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'installed'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/reissue
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function reissue($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'reissue'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/renew
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function renew($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'renew'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/request
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'request'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/resendapprovermail
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function resendApproverMail($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'resendapprovermail'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/revoke
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function revoke($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'revoke'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'show'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/terminate
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function terminate($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'terminate'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/ssl-certificaten/uninstalled
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uninstalled($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'uninstalled'], $params));
    }
}