<?php

namespace app\Component\DataBase;

use app\Component\Interface\DataBase;
use app\Models\Product;
use PDO;

class DBConnection implements DataBase
{
    public PDO $connection;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;port=3306;dbname=product", 'root', '13821382');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getProducts($search = ''): false|array
    {
        if ($search) {
            $statement = $this->connection->prepare(
                "SELECT * FROM product WHERE title LIKE '%$search%' ORDER BY create_date ASC "
            );
        } else {
            $statement = $this->connection->prepare("SELECT * FROM product ORDER BY create_date ASC ");
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id): false|array
    {
        $statement = $this->connection->prepare("SELECT * FROM product WHERE id='$id'");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setProduct(Product $product): bool
    {
        $title = $product->getTitle();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $imagePath = $product->getImagePath();
        $date = date('Y-m-d H:i:s');

        $statement = $this->connection->prepare(
            "INSERT INTO product (title,description,price,picture,create_date)
                 VALUES('$title','$description','$price','$imagePath','$date')"
        );
        return $statement->execute();
    }

    public function updateProduct(Product $product): void
    {
        $id = $product->getId();
        $title = $product->getTitle();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $imagePath = $product->getImagePath();
        $date = date('Y-m-d H:i:s');
        $statement = $this->connection->prepare(
            "UPDATE product SET title = '$title',description = '$description',
                   price = '$price',picture = '$imagePath',create_date ='$date'
                    WHERE id='$id';"
        );
        $statement->execute();
    }

    public function deleteProduct($id): void
    {
        $statement = $this->connection->prepare("DELETE FROM product WHERE id = '$id' ");
        $statement->execute();
    }
}