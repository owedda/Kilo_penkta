<?php

declare(strict_types=1);

namespace App\Kata1;

class ShippingDecorator implements CostInterface
{
    public function __construct(private readonly float $shipping, private readonly CostInterface $baseCost)
    {
    }

    public function cost(): float
    {
        return $this->baseCost->cost() + $this->shipping;
    }
}
