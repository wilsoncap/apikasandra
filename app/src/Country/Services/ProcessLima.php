<?php

namespace App\src\Country\Services;

use App\src\Country\Services\ProcessCountry;

class ProcessLima extends ProcessCountry
{
    public function execute()
    {
        // Lógica específica para Buenos Aires
        echo "Ejecutando proceso para Lima";
    }
}