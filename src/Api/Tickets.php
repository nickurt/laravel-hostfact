<?php

namespace nickurt\HostFact\Api;

class Tickets extends AbstractApi
{
    /**
     * https://www.hostfact.nl/developer/api/tickets/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/tickets/addmessage
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addMessage($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'addmessage'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/tickets/attachment-download
     * @return Attachments
     */
    public function attachments()
    {
        return new \nickurt\HostFact\Api\Attachments($this->client);
    }

    /**
     * https://www.hostfact.nl/developer/api/tickets/changeowner
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeOwner($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'changeowner'], $params));
    }

    /**
     * https://www.hostfact.nl/developer/api/tickets/changestatus
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeStatus($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'changestatus'], $params));
    }

    /**
     * https://www.hostfact.nl/developer/api/tickets/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'delete'], $params));
    }

    /**
     * https://www.hostfact.nl/developer/api/tickets/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'edit'], $params));
    }

    /**
     * https://www.hostfact.nl/developer/api/tickets/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'list'], $params));
    }

    /**
     * https://www.hostfact.nl/developer/api/tickets/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'ticket', 'action' => 'show'], $params));
    }
}