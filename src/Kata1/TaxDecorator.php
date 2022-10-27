<?php

declare(strict_types=1);

namespace App\Kata1;

class TaxDecorator implements CostInterface
{
    public function __construct(private readonly float $tax, private readonly CostInterface $baseCost)
    {
    }

    public function cost(): float
    {
        return $this->baseCost->cost() + $this->tax;
    }
}