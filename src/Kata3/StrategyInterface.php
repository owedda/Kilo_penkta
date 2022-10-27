<?php

namespace App\Kata3;

use App\Kata1\CostInterface;
use App\Kata2\PriceCalculatorInterface;

interface StrategyInterface
{
    public function execute(float $price, float $discount, float $tax): float;
}