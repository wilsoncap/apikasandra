<?php

namespace App\src\Vehicle\Interfaces;


interface VehicleServiceInterface
{
    public function getPrice(): void;
    public function getBrand(): void;
    public function getType(): void;
}