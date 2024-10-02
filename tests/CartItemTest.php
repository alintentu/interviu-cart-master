<?php

use PHPUnit\Framework\TestCase;

class CartItemTest extends TestCase {
    public function testTotalPriceIsCalculatedCorrectly() {
        $item = new CartItem(1, 2, 500);  
        $this->assertEquals(1000, $item->getTotalPrice()); 
    }

    public function testIncreaseQuantity() {
        $item = new CartItem(1, 1, 500);
        $item->increaseQuantity(2);  
        $this->assertEquals(3, $item->getQuantity()); 
        $this->assertEquals(1500, $item->getTotalPrice()); 
    }
}
