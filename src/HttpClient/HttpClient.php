<?php

namespace nickurt\HostFact\HttpClient;

use Exception;
use Http\Client\Exception\NetworkException;
use Http\Client\Exception\RequestException;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\RequestFactory;
use Psr\Http\Message\RequestInterface;

class HttpClient implements HttpClientInterface
{
    /**
     * @var \Http\Client\HttpClient
     */
    protected $httpClient;

    /**
     * @var \Http\Message\MessageFactory
     */
    protected $requestFactory;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * HttpClient constructor.
     * @param null $httpClient
     * @param RequestFactory|null $requestFactory
     */
    public function __construct($httpClient = null, RequestFactory $requestFactory = null)
    {
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: MessageFactoryDiscovery::find();
    }

    /**
     * @param array $body
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function post($body = [])
    {
        return $this->request($body, 'POST');
    }

    /**
     * @param $body
     * @param $method
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function request($body, $method)
    {
        $request = $this->requestFactory->createRequest(
            $method,
            $this->getOptions()['base_url'],
            ['Content-Type' => 'application/json'],
            json_encode($body)
        );

        return $this->sendRequest($request);
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = array_merge($this->options, $options);
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     * @throws \Http\Client\Exception
     */
    private function sendRequest(RequestInterface $request)
    {
        try {
            $response = $this->httpClient->sendRequest($request);

            return json_decode((string)$response->getBody(), true);
        } catch (NetworkException $networkException) {
            throw new NetworkException($networkException->getMessage(), $request, $networkException);
        } catch (Exception $exception) {
            throw new RequestException($exception->getMessage(), $request, $exception);
        }
    }
}