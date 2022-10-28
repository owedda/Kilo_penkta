<?php

declare(strict_types=1);

namespace App\Kata3;

use App\Kata2\PriceCalculator;

final class DefaultStrategy implements StrategyInterface
{
    public function execute(float $price, float $discount, float $tax): float
    {
        $calculator = new PriceCalculator();
        return $calculator->calculate($price, $discount, $tax)->cost();
    }
}
