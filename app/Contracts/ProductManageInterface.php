<?php

namespace App\Contracts;

interface ProductManageInterface {
    public function createProduct(array $data);
    public function updateProduct($id, array $data);
    public function deleteProduct($id);
}