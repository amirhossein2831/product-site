<?php

namespace app\DBConnection;

use PDO;

class DBConnection {
    public PDO $connection;
    public function __construct(){
        $this->connection = new PDO("mysql:host=localhost;port=3306;dbname=product", 'root', '13821382');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getProducts($search = ''): false|array  {
        if ($search) {
            $statement = $this->connection->prepare("SELECT * FROM product WHERE title LIKE '%$search%' ORDER BY create_date ASC ");
        }else
            $statement = $this->connection->prepare("SELECT * FROM product ORDER BY create_date ASC ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}