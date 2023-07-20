<?php

namespace app\DBConnection;

use PDO;

class DBConnection {
    public PDO $connection;
    public array $products;
    public function __construct(){
        $this->connection = new PDO("mysql:host=localhost;port=3306;dbname=product", 'root', '13821382');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->products = [];
    }
    public function getProducts($search = ''): void {
        if ($search) {
            $statement = $this->connection->prepare("SELECT * FROM product WHERE title LIKE '$search' ORDER BY date_create DESC ");
        }else
            $statement = $this->connection->prepare("SELECT * FROM product ORDER BY date_create DESC ");

        $statement->execute();
        $this->products = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}