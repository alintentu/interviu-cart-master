<?php

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase {
    public function testAddItemToCart() {
        $cart = new Cart(new FreeShippingStrategy(200, 15));
        $cart->addItem(new CartItem(1, 1, 500));
        $this->assertEquals(500, $cart->getTotalWithoutShipping());
    }

    public function testRemoveItemFromCart() {
        $cart = new Cart(new FreeShippingStrategy(200, 15));
        $cart->addItem(new CartItem(1, 1, 500));
        $cart->addItem(new CartItem(2, 2, 300));
        $cart->removeItem(2);
        $this->assertEquals(500, $cart->getTotalWithoutShipping()); 
    }

    public function testTotalWithDiscountAndShipping() {
        $cart = new Cart(
            new FreeShippingStrategy(200, 15),
            new VoucherDiscount(['DISCOUNT15'], 'DISCOUNT15', [1000 => 15])
        );
        $cart->addItem(new CartItem(1, 1, 1200));  
        $this->assertEquals(1035, $cart->getTotalWithShippingAndDiscount());  
    }

    public function testFreeShippingIsAppliedCorrectly() {
        $cart = new Cart(new FreeShippingStrategy(200, 15));
        $cart->addItem(new CartItem(1, 1, 250));  
        $this->assertEquals(250, $cart->getTotalWithShippingAndDiscount());  
    }
}
