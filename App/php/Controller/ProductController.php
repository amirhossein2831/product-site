<?php

namespace app\Controller;

class ProductController
{
    public function index(): void {
        $this->renderView('product/index');
    }
    public function create(): void {
        $this->renderView('product/create');
    }
    public function update(): void {
        $this->renderView('product/update');
    }
    public function delete(): void {
        $this->renderView('product/delete');
    }
    public function renderView($view): void {      //viewName like index create ...
        ob_start();
        include_once __DIR__ . "/../views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . '/../views/_layout.php';
    }
}