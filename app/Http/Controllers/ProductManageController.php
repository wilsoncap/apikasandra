<?php

namespace App\Http\Controllers;

use App\Services\ProductManageService;
use Illuminate\Http\Request;

class ProductManageController extends Controller {
    protected $productManageService;

    public function __construct(ProductManageService $productManageService) {
        $this->productManageService = $productManageService;
    }

    public function store(Request $request) {
        $data = $request->all();
        $this->productManageService->createProduct($data);
        return redirect()->route('products.index');
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $this->productManageService->updateProduct($id, $data);
        return redirect()->route('products.index');
    }

    public function destroy($id) {
        $this->productManageService->deleteProduct($id);
        return redirect()->route('products.index');
    }
}
