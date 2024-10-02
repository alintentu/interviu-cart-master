<?php

use PHPUnit\Framework\TestCase;

class VoucherDiscountTest extends TestCase {
    public function testNoDiscountWhenTotalBelowThreshold() {
        $discount = new VoucherDiscount(['DISCOUNT15'], 'DISCOUNT15', [1000 => 15]);
        $total = 800;
        $this->assertEquals(800, $discount->applyDiscount($total)); 
    }

    public function testDiscountIsAppliedCorrectly() {
        $discount = new VoucherDiscount(['DISCOUNT15'], 'DISCOUNT15', [1000 => 15]);
        $total = 1200;
        $this->assertEquals(1020, $discount->applyDiscount($total));  
    }

    public function testMultipleDiscountTiers() {
        $discount = new VoucherDiscount(['DISCOUNT15_20'], 'DISCOUNT15_20', [2000 => 20, 1000 => 15]);
        $total = 2500;
        $this->assertEquals(2000, $discount->applyDiscount($total)); 
    }
}
