<?php

interface CartItemInterface {
    public function getId(): int;
    public function getQuantity(): int;
    public function getPrice(): float;
    public function getTotalPrice(): float;
}