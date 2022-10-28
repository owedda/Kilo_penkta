<?php

declare(strict_types=1);

namespace App\Kata2;

use App\Kata1\CostInterface;
use App\Kata1\DiscountDecorator;
use App\Kata1\Price;
use App\Kata1\ShippingDecorator;

final class PriceCalculator implements PriceCalculatorInterface
{
    //Didn't want to rename classes to not ruin tests. but it's Simple Factory
    public function calculate(float $price, float $discount, float $tax): CostInterface
    {
        return new ShippingDecorator($tax, new DiscountDecorator($discount, new Price($price)));
    }
}
