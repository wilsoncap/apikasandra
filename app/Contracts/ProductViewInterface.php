<?php

namespace App\Contracts;

interface ProductViewInterface {
    public function getAllProducts();
    public function getProductById($id);
}