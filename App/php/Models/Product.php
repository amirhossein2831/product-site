<?php

namespace app\Models;

use app\DBConnection\DBConnection;

class Product
{
    public ?int $id;
    public ?string $title;
    public ?string $description;
    public ?float $price;
    public ?string $imagePath;
    public ?array $imageFile;

    public function __construct($productDate,$imageFile)
    {
        $this->id = $productDate['id'] ?? null;
        $this->title = $productDate['title'];
        $this->description = $productDate['description'] ?? '';
        $this->price =(float) $productDate['price'];
        $this->imagePath = null;
        $this->imageFile = $imageFile ?? null;
    }

    public function save(DBConnection $Db): void
    {
        $this->saveFile();
        $Db->setProduct($this);
    }

    public function saveFile(): void
    {
        if (!is_null($this->imageFile)) {
            $filePath = $this->imageFile['tmp_name'];
            $originalFilename = $this->imageFile['name'];
            $fileExtension = pathinfo($originalFilename, PATHINFO_EXTENSION);
            $uniqueFilename = uniqid('file_', true) . '.' . $fileExtension;

            $targetFile = './resource/image/'. $uniqueFilename;
            $this->imagePath = 'resource/image/'. $uniqueFilename;
            if (move_uploaded_file($filePath,$targetFile)) {
                echo "sss";
            }
            echo "file";
        }
    }

}