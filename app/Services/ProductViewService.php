<?php

namespace App\Services;

use App\Contracts\ProductViewInterface;

class ProductViewService {
    protected $productRepository;

    public function __construct(ProductViewInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts() {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById($id) {
        return $this->productRepository->getProductById($id);
    }
}