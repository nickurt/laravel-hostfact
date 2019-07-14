<?php

namespace nickurt\HostFact;

class HostFact
{
    /** @var \Illuminate\Foundation\Application */
    protected $app;

    /** @var \nickurt\HostFact\Client */
    protected $client;

    /** @var array */
    protected $panels = [];

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
     * @param null|string $name
     * @return \nickurt\HostFact\Client
     */
    public function panel($name = null)
    {
        $name = $name ?: $this->getDefaultPanel();

        return $this->panels[$name] = $this->get($name);
    }

    /**
     * @return string
     */
    public function getDefaultPanel()
    {
        return $this->app['config']['hostfact.default'];
    }

    /**
     * @param string $name
     * @return \nickurt\HostFact\Client
     */
    protected function get($name)
    {
        return $this->panels[$name] ?? $this->resolve($name);
    }

    /**
     * @param string $name
     * @return \nickurt\HostFact\Client
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
     * @param string $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["hostfact.panels.{$name}"];
    }
}
