<?php

class DiscountManager {
    private $discountStrategies = [];

    public function addDiscountStrategy(DiscountStrategyInterface $strategy) {
        $this->discountStrategies[] = $strategy;
    }

    public function applyDiscounts(float $total): float {
        foreach ($this->discountStrategies as $strategy) {
            $total = $strategy->applyDiscount($total);
        }
        return $total;
    }
}
