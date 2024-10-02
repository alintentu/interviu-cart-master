<?php

class FreeShippingStrategy implements ShippingStrategyInterface {
    private $threshold;
    private $shippingCost;

    public function __construct(float $threshold, float $shippingCost) {
        $this->threshold = $threshold;
        $this->shippingCost = $shippingCost;
    }

    public function calculateShippingCost(float $total): float {
        return $total >= $this->threshold ? 0 : $this->shippingCost;
    }
}