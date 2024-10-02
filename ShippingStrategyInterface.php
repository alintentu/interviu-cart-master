<?php

interface ShippingStrategyInterface {
    public function calculateShippingCost(float $total): float;
}