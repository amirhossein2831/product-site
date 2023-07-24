<?php

namespace app\Component\Interface;

use app\Component\DataBase\DBConnection;

interface Model
{
    public function __construct($var1,$var2);
    public function save(DBConnection $Db): void;
    public function update(DBConnection $Db): void;
}