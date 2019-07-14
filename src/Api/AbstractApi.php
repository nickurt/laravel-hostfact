<?php

namespace nickurt\HostFact\Api;

use nickurt\HostFact\Client;

abstract class AbstractApi implements ApiInterface
{
    /** @var \nickurt\HostFact\Client */
    public $client;

    /**
     * AbstractApi constructor.
     * @param \nickurt\HostFact\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $parameters
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