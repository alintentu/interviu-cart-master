<?php

require_once 'CartItemInterface.php';
require_once 'CartItem.php';
require_once 'ShippingStrategyInterface.php';
require_once 'FreeShippingStrategy.php';
require_once 'DiscountStrategyInterface.php';
require_once 'VoucherDiscount.php';
require_once 'DiscountManager.php';
require_once 'Cart.php';

$shippingStrategy = new FreeShippingStrategy(200, 15);
$discountManager = new DiscountManager();

$validVouchers = ['DISCOUNT15_20'];
$discounts = [
    2000 => 20, 
    1000 => 15  
];
$voucherDiscount = new VoucherDiscount($validVouchers, 'DISCOUNT15_20', $discounts);
$discountManager->addDiscountStrategy($voucherDiscount);

$cart = new Cart($shippingStrategy, $discountManager);

$cart->addItem(new CartItem(1, 1, 1200)); 
$cart->addItem(new CartItem(2, 2, 500)); 

echo 'Total cos cu discounturi (Inainte de eliminare): ' . $cart->getTotalWithShippingAndDiscounts() . "\n";
echo 'Total cos cu discounturi (dupa eliminare produs ID 2): ' . $cart->recalculateTotalAfterRemoval(2) . "\n";
