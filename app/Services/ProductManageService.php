<?php

namespace App\Services;

use App\Contracts\ProductManageInterface;

class ProductManageService {
    protected $productRepository;

    public function __construct(ProductManageInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function createProduct(array $data) {
        return $this->productRepository->createProduct($data);
    }

    public function updateProduct($id, array $data) {
        return $this->productRepository->updateProduct($id, $data);
    }

    public function deleteProduct($id) {
        return $this->productRepository->deleteProduct($id);
    }
}