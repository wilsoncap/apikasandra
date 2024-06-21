<?php

namespace App\Repositories;

use App\Contracts\ProductViewInterface;
use App\Contracts\ProductManageInterface;
use App\Models\Product;

class ProductRepository implements ProductViewInterface, ProductManageInterface {
    public function getAllProducts() {
        return Product::all();
    }

    public function getProductById($id) {
        return Product::find($id);
    }

    public function createProduct(array $data) {
        return Product::create($data);
    }

    public function updateProduct($id, array $data) {
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public function deleteProduct($id) {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }
}