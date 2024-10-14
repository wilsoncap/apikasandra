<?php

namespace App\src\Vehicle\DTOs;

class VehicleDTO
{
    public int $price;
    public string $brand;
    public string $type;

    public function __construct(array $request)
    {
        $this->price = $request['price'];
        $this->brand = $request['brand'];
        $this->type = $request['type'];
    }
}
