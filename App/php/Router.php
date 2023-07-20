<?php

namespace app;

class Router
{
    public array $getRout = [];
    public array $postRout = [];

    public function get($url,$fn){
        $this->getRout[$url] = $fn;
    }
    public function post($url,$fn){
        $this->postRout[$url] = $fn;
    }
    public function resolve(): void
    {
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRout[$currentUrl] ?? null;
        }else
            $fn = $this->postRout[$currentUrl] ?? null;
        if ($fn) {
            var_dump($fn);
        }else
            echo "Page Not Found";


    }
}