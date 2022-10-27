<?php

declare(strict_types=1);

namespace App;

use App\Kata1\DiscountDecorator;
use App\Kata1\Price;
use App\Kata1\ShippingDecorator;
use App\Kata1\TaxDecorator;
use App\Kata2\PriceCalculatorInterface;
use App\Kata3\DefaultStrategy;
use App\Kata3\DiscountStrategy;
use App\Kata3\DpdStrategy;
use App\Kata3\PriceContext;

class DemoRun
{
    private bool $isTuesday;
    private float $shipping;
    private float $discount;
    private float $price;

    public function __construct()
    {
        $this->shipping = 8;
        $this->discount = 20;
        $this->price = 100;
        $this->isTuesday = false;
    }

    public function kata1(): float
    {
        // How would you write Shipping and Tax objects:
        // $tax = new TaxDecorator(10,new ShippingDecorator($this->shipping, new DiscountDecorator($this->discount , new Price($this->price))));
        $product = new ShippingDecorator($this->shipping, new DiscountDecorator($this->discount , new Price($this->price)));
        return $product->cost();
    }

    public function kata2(PriceCalculatorInterface $calculator): float
    {
        $product = $calculator->calculate($this->price, $this->discount, $this->shipping);
        return $product->cost();
    }

    public function kata3(): float
    {
        $strategy = new PriceContext();

        if ($this->isTuesday) {
            $strategy->setStrategy(new DiscountStrategy());
        }
        else {
            $strategy->setStrategy(new DefaultStrategy());
        }

        return $strategy->getPrice($this->price, $this->discount, $this->shipping);
    }

    public function kata4(): float
    {
        $strategy = new PriceContext();
        $strategy->setStrategy(new DpdStrategy());

        return $strategy->getPrice($this->price, $this->discount, $this->shipping);
    }

    /**
     * @return bool
     */
    public function isTuesday(): bool
    {
        return $this->isTuesday;
    }

    /**
     * @param bool $isTuesday
     */
    public function setIsTuesday(bool $isTuesday): void
    {
        $this->isTuesday = $isTuesday;
    }
}
