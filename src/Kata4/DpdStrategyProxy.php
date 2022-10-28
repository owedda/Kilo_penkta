<?php

namespace App\Kata4;

use App\Kata3\StrategyInterface;

class DpdStrategyProxy implements StrategyInterface
{
    public function __construct(private readonly StrategyInterface $strategy)
    {
    }

    public function execute(float $price, float $discount, float $tax): float
    {
        $shippingProvider = new DpdShippingProvider();
        return $this->strategy->execute($price, $discount, $shippingProvider->ourCost());
    }
}