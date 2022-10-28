<?php

declare(strict_types=1);

namespace App\Kata3;

use App\Kata2\FreeShippingCalculator;

final class DiscountStrategy implements StrategyInterface
{
    public function execute(float $price, float $discount, float $tax): float
    {
        $calculator = new FreeShippingCalculator();
        return $calculator->calculate($price, $discount, $tax)->cost();
    }
}