<?php

namespace app\Controller;

use app\DBConnection\DBConnection;
use app\Models\Product;

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
        $error = [];
        $productDate = [
            'title'=>'',
            'description'=>'',
            'image'=>'',
            'price'=>''
        ];
        $this->renderView('product/create',['product' => $productDate,
            'error'=>$error]);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $product = new Product($_POST,$_FILES['image']);
            $product->save($this->db);
            header('Location: /product');
            exit;
        }
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