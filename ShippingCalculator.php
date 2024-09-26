<?php

class ShippingCalculator {
    private $freeShippingThreshold = 200;
    private $defaultShippingCost = 15;

    public function calculate(float $cartTotal): float {
        if ($cartTotal > $this->freeShippingThreshold) {
            return 0;
        }
        return $this->defaultShippingCost;
    }
}