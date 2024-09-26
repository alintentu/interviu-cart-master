<?php

class FlatRateShippingStrategy implements ShippingStrategyInterface {
    private $rate;

    public function __construct(float $rate = 15) {
        $this->rate = $rate;
    }

    public function calculateShippingCost(float $totalValue): float {
        return $this->rate;
    }
}