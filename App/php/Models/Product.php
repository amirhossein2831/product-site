<?php

namespace app\Models;

use app\Component\DataBase\DBConnection;
use app\Component\Interface\Model;

class Product implements Model
{
    public ?int $id;

    public ?string $title;
    public ?string $description;
    public ?float $price;
    public ?string $imagePath;
    public ?array $imageFile;

    public function __construct($productDate, $imageFile)
    {
        $this->id = $productDate['id'] ?? null;
        $this->title = $productDate['title'];
        $this->description = $productDate['description'] ?? '';
        $this->price = (float)$productDate['price'];
        $this->imagePath = $productDate['picture'] ?? null;
        $this->imageFile = $imageFile ?? null;
    }

    public function save(DBConnection $Db): void
    {
        $this->saveFile();
        $Db->setProduct($this);
    }

    public function update(DBConnection $Db): void
    {
        $this->saveFile();
        $Db->updateProduct($this);
    }

    private function saveFile(): void
    {
        if (!is_null($this->imageFile) && $this->imageFile['tmp_name'] !== '') {
            if (!is_null($this->imagePath) && ($this->imagePath) > 0) {
                $path = './' .$this->imagePath;
                unlink($path);
            }
            $filePath = $this->imageFile['tmp_name'];
            $originalFilename = $this->imageFile['name'];
            $fileExtension = pathinfo($originalFilename, PATHINFO_EXTENSION);
            $uniqueFilename = uniqid('file_', true) . '.' . $fileExtension;
            $targetFile = './resource/image/' . $uniqueFilename;
            $this->imagePath = 'resource/image/' . $uniqueFilename;
            move_uploaded_file($filePath, $targetFile);
        }
    }
}