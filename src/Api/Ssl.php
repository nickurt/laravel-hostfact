<?php

namespace nickurt\HostFact\Api;

class Ssl extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'add'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function download($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'download'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'edit'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function getStatus($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'getstatus'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function installed($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'installed'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'list'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function reissue($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'reissue'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function renew($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'renew'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function request($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'request'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function resendApproverMail($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'resendapprovermail'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function revoke($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'revoke'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'show'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function terminate($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'terminate'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function uninstalled($params)
    {
        return $this->post(array_merge(['controller' => 'ssl', 'action' => 'uninstalled'], $params));
    }
}