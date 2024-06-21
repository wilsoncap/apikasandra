<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductViewService;

class ProductViewController extends Controller
{
    protected $productViewService;

    public function __construct(ProductViewService $productViewService) {
        $this->productViewService = $productViewService;
    }

    public function index() {
        $products = $this->productViewService->getAllProducts();
        return view('products.index', compact('products'));
    }

    public function show($id) {
        $product = $this->productViewService->getProductById($id);
        return view('products.show2', compact('product'));
    }
}
