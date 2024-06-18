<?php
// creamos clases que implementen la interfaz DiscountInterface para diferentes tipos de descuentos.
// app/Services/PercentageDiscount.php
namespace App\Services;

use App\Contracts\DiscountInterface;

class PercentageDiscount implements DiscountInterface {
    protected $percentage;

    public function __construct(float $percentage) {
        $this->percentage = $percentage;
    }

    public function calculate(float $price): float {
        return $price * (1 - ($this->percentage / 100));
    }
}
