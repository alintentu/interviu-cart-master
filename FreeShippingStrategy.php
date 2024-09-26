<?php

class FreeShippingStrategy implements ShippingStrategyInterface {
    private $threshold;

    public function __construct(float $threshold = 200) {
        $this->threshold = $threshold;
    }

    public function calculateShippingCost(float $totalValue): float {
        return $totalValue >= $this->threshold ? 0 : 15;
    }
}