<?php

declare(strict_types=1);

namespace App\Kata3;

use App\Kata1\CostInterface;
use App\Kata2\PriceCalculatorInterface;

class PriceContext
{
    private StrategyInterface $strategy;

    public function setStrategy(StrategyInterface $newStrategy): void
    {
        $this->strategy = $newStrategy;
    }

    public function getPrice(float $price, float $discount, float $tax): float
    {
        return $this->strategy->execute($price, $discount, $tax);
    }
}