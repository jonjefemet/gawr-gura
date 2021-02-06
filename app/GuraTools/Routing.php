<?php
namespace App\GuraTools;

class Routing
{

    public function __construct(
        private string $controller = '',
        private string $method = '',
        private array $params = []
    )
    {
        $this->run($this->getUrl());
    }

    public function run(string $url)
    {
        $this->getControllerAndMethod($url);

        print_r($url);
        #$controller = Container::newController($this->controller);

        #if (method_exists($controller, $this->method)) {
        #    call_user_func_array([$controller, $this->method], $this->params);
        #} else {
        #    throw new \Exception("method not found", 1);
        #}
    }

    public function getUrl()
    {
        return isset($_GET['url']) ? $_GET['url'] : 'Home/Index';
    }

    public function getControllerAndMethod(string $url)
    {
        $array_url = explode('/',  $url);
        $this->controller = $array_url[0] . 'Controller';

        if (isset($array_url[1])) {
            $this->method =  $array_url[1] != '' ? $array_url[1] : 'index';
        } else {
            $this->method = 'index';
        }

        if (isset($array_url[2])) {
            unset($array_url[0], $array_url[1]);
            $this->params = $array_url;
        }
    }
}
