<?php

use PHPUnit\Framework\TestCase;

require_once 'Cart.php';

class CartTest extends TestCase
{
    public function testAddItemIncreasesTotal()
    {
        $cart = new Cart();
        $cart->addItem(['product_id' => 1, 'qty' => 1, 'price' => 100]);

        $this->assertEquals(115, $cart->getTotalValue());
    }

    public function testFreeShipping()
    {
        $cart = new Cart();
        $cart->addItem(['product_id' => 1, 'qty' => 10, 'price' => 25]);

        $this->assertEquals(250, $cart->getTotalValue());
        $this->assertEquals(0, $cart->getShippingCost());
    }

    public function testMultipleItems()
    {
        $cart = new Cart();
        $cart->addItem(['product_id' => 1, 'qty' => 1, 'price' => 10]);
        $cart->addItem(['product_id' => 2, 'qty' => 2, 'price' => 15]);

        $this->assertEquals(55, $cart->getTotalValue());
    }
}
