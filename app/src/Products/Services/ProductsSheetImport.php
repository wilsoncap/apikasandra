<?php

namespace App\src\Products\Services;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Product;

class ProductsSheetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        //dd('ProductsSheetImport', $row);
        return new Product([
            'name' => $row['name'],
            'price' => $row['price'],
            // ... otros campos
        ]);
    }
}