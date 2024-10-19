<?php

namespace App\src\Country\Services;

use App\src\Country\Services\ProcessCountry;

class ProcessBuenosAires extends ProcessCountry
{
    public function execute()
    {
        // Lógica específica para Buenos Aires
        echo "Ejecutando proceso para Buenos Aires";
    }
}