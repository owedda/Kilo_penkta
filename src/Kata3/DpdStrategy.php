<?php

namespace App\Kata3;

use App\Kata1\CostInterface;
use App\Kata2\PriceCalculator;
use App\Kata4\DpdShippingProvider;

class DpdStrategy implements \App\Kata3\StrategyInterface
{
    public function execute(float $price, float $discount, float $tax): float
    {
        $calculator = new PriceCalculator();
        $shippingProvider = new DpdShippingProvider();
        return $calculator->calculate($price, $discount, $shippingProvider->ourCost())->cost();
    }
}