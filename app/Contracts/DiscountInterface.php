<?php

// app/Contracts/DiscountInterface.php
//creamos una interfaz DiscountInterface que define un método calculate() para calcular el descuento.

namespace App\Contracts;

interface DiscountInterface {
    public function calculate(float $price): float;
}
