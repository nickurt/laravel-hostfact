<?php

namespace nickurt\HostFact\Api;

class Tickets extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'add'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
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
     * @throws \Http\Client\Exception
     */
    public function changeOwner($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'changeowner'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function changeStatus($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'changestatus'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'delete'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'edit'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'list'], $params));
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'show'], $params));
    }
}