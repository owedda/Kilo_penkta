<?php

declare(strict_types=1);

namespace App\Kata2;

use App\Kata1\CostInterface;

interface PriceCalculatorInterface
{
    public function calculate(float $price, float $discount, float $tax): CostInterface;
}
