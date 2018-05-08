<?php

namespace nickurt\HostFact\Api;

use nickurt\HostFact\Client;

abstract class AbstractApi implements ApiInterface
{
    /**
     * @var Client
     */
    public $client;

    /**
     * AbstractApi constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function post($parameters)
    {
        return $this->client->getHttpClient()->post(array_merge([
            'api_key' => $this->client->getHttpClient()->getOptions()['key']
        ], $parameters));
    }
}