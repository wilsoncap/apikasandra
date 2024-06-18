<?php

// app/Services/QuantityDiscount.php
namespace App\Services;

use App\Contracts\DiscountInterface;

class QuantityDiscount implements DiscountInterface {
    protected $quantity;
    protected $discount;

    public function __construct(int $quantity, float $discount) {
        $this->quantity = $quantity;
        $this->discount = $discount;
    }

    public function calculate(float $price): float {
        return $price - ($this->quantity * $this->discount);
    }
}
