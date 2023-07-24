<?php

namespace app\Models;

use app\Component\DataBase\DBConnection;
use app\Component\Interface\Model;

class Product implements Model
{
    private ?int $id;

    private ?string $title;
    private ?string $description;
    private ?float $price;
    private ?string $imagePath;
    private ?array $imageFile;

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
                $path = './' . $this->imagePath;
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getImageFile(): ?array
    {
        return $this->imageFile;
    }

    public function setImageFile(?array $imageFile): void
    {
        $this->imageFile = $imageFile;
    }

}