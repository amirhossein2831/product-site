<?php

namespace app\Component\Interface;

use app\Models\Product;

interface DataBase
{
    public function __construct();

    public function getProducts($search = ''): false|array;

    public function getProductById($id): false|array;

    public function setProduct(Product $product): bool;

    public function updateProduct(Product $product): void;

    public function deleteProduct($id): void;

}