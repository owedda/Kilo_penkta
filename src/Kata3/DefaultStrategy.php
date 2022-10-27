<?php

declare(strict_types=1);

namespace App\Kata3;

use App\Kata1\CostInterface;
use App\Kata2\PriceCalculator;

class DefaultStrategy implements \App\Kata3\StrategyInterface
{
    public function execute(float $price, float $discount, float $tax): float
    {
        $calculator = new PriceCalculator();
        return $calculator->calculate($price, $discount, $tax)->cost();
    }
}
