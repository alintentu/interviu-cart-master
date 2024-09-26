<?php

class Cart {
    private $items = [];
    private $shippingStrategy;

    public function __construct(ShippingStrategyInterface $shippingStrategy) {
        $this->shippingStrategy = $shippingStrategy;
    }

    public function addItem(CartItemInterface $item): void {
        $productId = $item->getId();

        if (isset($this->items[$productId])) {
            // Produsul exista deja, actualizam cantitatea
            $this->items[$productId]->increaseQuantity($item->getQuantity());
        } else {
            // Adaugam produsul nou
            $this->items[$productId] = $item;
        }
    }

    public function getTotalWithoutShipping(): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotalPrice();
        }
        return $total;
    }

    public function getShippingCost(): float {
        return $this->shippingStrategy->calculateShippingCost($this->getTotalWithoutShipping());
    }

    public function getTotalWithShipping(): float {
        return $this->getTotalWithoutShipping() + $this->getShippingCost();
    }

    public function getItems(): array {
        return $this->items;
    }
}
