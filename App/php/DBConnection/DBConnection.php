<?php

namespace app\DBConnection;

use PDO;

class DBConnection {
    public PDO $connection;
    public function __construct(){
        $this->connection = new PDO("mysql:host=localhost;port=3306;dbname=product", 'root', '13821382');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->products = [];
    }


}