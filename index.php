<?php

require_once 'CartItemInterface.php';
require_once 'CartItem.php';
require_once 'ShippingStrategyInterface.php';
require_once 'FreeShippingStrategy.php';
require_once 'FlatRateShippingStrategy.php';
require_once 'Cart.php';

$shippingStrategy = new FreeShippingStrategy(200); 
$cart = new Cart($shippingStrategy);

$cart->addItem(new CartItem(1, 1, 5));
$cart->addItem(new CartItem(5, 3, 10));
$cart->addItem(new CartItem(1, 2, 5));

echo 'Shipping cost: ' . $cart->getShippingCost() . "\n";
echo 'Cart total: ' . $cart->getTotalWithShipping() . "\n";
