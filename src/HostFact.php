<?php

namespace nickurt\HostFact;

class HostFact
{
    /**
     * @var
     */
    protected $app;

    /**
     * @var array
     */
    protected $panels = [];

    /**
     * @var
     */
    protected $client;

    /**
     * HostFact constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->client, $method], $args);
    }

    /**
     * @param null $name
     * @return Api\Client
     */
    public function panel($name = null)
    {
        $name = $name ?: $this->getDefaultPanel();

        return $this->panels[$name] = $this->get($name);
    }

    /**
     * @return mixed
     */
    public function getDefaultPanel()
    {
        return $this->app['config']['hostfact.default'];
    }

    /**
     * @param $name
     * @return Api\Client
     */
    protected function get($name)
    {
        return $this->panels[$name] ?? $this->resolve($name);
    }

    /**
     * @param $name
     * @return Client
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        $this->client = new \nickurt\HostFact\Client();
        $this->client->setOptions([
            'base_url' => $config['url'],
            'key' => $config['key']
        ]);

        return $this->client;
    }

    /**
     * @param $name
     * @return mixed
     */
    protected function getConfig($name)
    {
        return $this->app['config']["hostfact.panels.{$name}"];
    }
}
