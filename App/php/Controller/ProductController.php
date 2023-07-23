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
        $search = $_GET['search'] ?? '';
        $products = $this->db->getProducts($search);
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
        $id = $_GET['id'] ?? null;
        $productDate = [
            'title'=>'',
            'description'=>'',
            'image'=>'',
            'price'=>''
        ];
        if (!is_null($id)) {
          $productDate = $this->db->getProductById($id);
        }
        $this->renderView('product/update',['product' => $productDate]);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $_POST['id'] = $id;
            $_POST['picture'] = $productDate[0]['picture'];

            $product = new Product($_POST,$_FILES['image']);
            $product->update($this->db);
            header('Location: /product');
            exit;
        }
    }
    public function delete(): void {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $_POST['delete'];
            if (isset($id)) {
                $product = $this->db->getProductById($id);
                $imagePath = './'. $product[0]['picture'];
                unlink($imagePath);
                $this->db->deleteProduct($id);
                header("Location: /product");
            }
        }
    }

    public function phone(): void
    {
        $id = $_POST['id'] ?? '';
        $product = $this->db->getProductById($id);
        $this->renderView('product/phone',['product'=>$product]);
    }
    public function renderView($view,$products = []): void {      //viewName like index create ...
        ob_start();
        include_once __DIR__ . "/../views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . '/../views/_layout.php';
    }
}