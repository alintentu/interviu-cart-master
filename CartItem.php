<?php

class CartItem implements CartItemInterface {
    private $id;
    private $quantity;
    private $price;

    public function __construct(int $id, int $quantity, float $price) {
        $this->id = $id;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getTotalPrice(): float {
        return $this->price * $this->quantity;
    }

    public function increaseQuantity(int $quantity): void {
        $this->quantity += $quantity;
    }
}