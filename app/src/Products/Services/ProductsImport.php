<?php

namespace App\src\Products\Services;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements WithMultipleSheets, WithHeadingRow
{
    public function sheets(): array
    {
        return [
            new ProductsSheetImport() // Otra clase que importa los datos de la hoja 'Products'
        ];
    }
}
