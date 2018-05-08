<?php

namespace nickurt\HostFact\HttpClient;

interface HttpClientInterface
{
    /**
     * @return array
     */
    public function getOptions();

    /**
     * @param array $body
     * @return mixed
     */
    public function post($body = []);

    /**
     * @param $body
     * @param $method
     * @return mixed
     */
    public function request($body, $method);

    /**
     * @param array $options
     */
    public function setOptions(array $options);
}