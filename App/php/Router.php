<?php

namespace app;

class Router
{
    private array $getRout;
    private array $postRout;


    public function __construct()
    {
        $this->getRout = [];
        $this->postRout = [];
    }

    public function get($url, $fn): void
    {
        $this->getRout[$url] = $fn;
    }

    public function post($url, $fn): void
    {
        $this->postRout[$url] = $fn;
    }

    public function resolve(): void
    {
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRout[$currentUrl] ?? null;
        } else {
            $fn = $this->postRout[$currentUrl] ?? null;
        }
        if ($fn) {
            call_user_func($fn);
        } else {
            echo "Page Not Found";
        }
    }
}