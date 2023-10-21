<?php

class Controller
{
    protected $view;
    protected $config;
    protected $database;

    public function __construct(Psr\Container\ContainerInterface $container)
    {
        $this->view = $container->get('view');
        $this->config = $container->get('config');
        $this->database = $container->get('database');
    }

    protected function html($response, $data)
    {
        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'text/html');
    }

    protected function json($response, $data)
    {
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }

    protected function txt($response, $data)
    {
        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'text/plain');
    }
}
