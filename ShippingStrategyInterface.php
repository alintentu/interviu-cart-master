<?php

interface ShippingStrategyInterface {
    public function calculateShippingCost(float $totalValue): float;
}