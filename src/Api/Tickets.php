<?php

namespace nickurt\HostFact\Api;

class Tickets extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'add'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addMessage($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'addmessage'], $params));
    }

    /**
     * @return Attachments
     */
    public function attachments()
    {
        return new \nickurt\HostFact\Api\Attachments($this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeOwner($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'changeowner'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeStatus($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'changestatus'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'delete'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'edit'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'list'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'show'], $params));
    }
}