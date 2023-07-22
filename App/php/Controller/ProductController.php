<?php

namespace app\Controller;

use app\DBConnection\DBConnection;

class ProductController
{
    public DBConnection $db;

    public function __construct(){
        $this->db = new DBConnection();
    }
    public function index(): void {
        $products = $this->db->getProducts();
        $search = $_GET['search'] ?? '';
        $this->renderView('product/index',['product' => $products,
                                                 'search'=>$search]);
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
    public function renderView($view,$products = []): void {      //viewName like index create ...
        ob_start();
        include_once __DIR__ . "/../views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . '/../views/_layout.php';
    }
}