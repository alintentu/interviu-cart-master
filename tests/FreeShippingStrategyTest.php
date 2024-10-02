<?php

use PHPUnit\Framework\TestCase;

class FreeShippingStrategyTest extends TestCase {
    public function testShippingIsFreeAboveThreshold() {
        $shipping = new FreeShippingStrategy(200, 15);
        $total = 250;
        $this->assertEquals(0, $shipping->calculateShippingCost($total)); 
    }

    public function testShippingCostIsAppliedBelowThreshold() {
        $shipping = new FreeShippingStrategy(200, 15);
        $total = 150;
        $this->assertEquals(15, $shipping->calculateShippingCost($total)); 
    }
}
