<?php


// app/Services/FixedDiscount.php
namespace App\Services;

use App\Contracts\DiscountInterface;

class FixedDiscount implements DiscountInterface {
    protected $amount;

    public function __construct(float $amount) {
        $this->amount = $amount;
    }

    public function calculate(float $price): float {
        return max($price - $this->amount, 0);
    }
}
