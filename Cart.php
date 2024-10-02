<?php

class Cart {
    private $items = [];
    private $shippingStrategy;
    private $discountManager;

    public function __construct(ShippingStrategyInterface $shippingStrategy, DiscountManager $discountManager) {
        $this->shippingStrategy = $shippingStrategy;
        $this->discountManager = $discountManager;
    }

    public function addItem(CartItemInterface $item): void {
        $productId = $item->getId();

        if (isset($this->items[$productId])) {
            $this->items[$productId]->increaseQuantity($item->getQuantity());
        } else {
            $this->items[$productId] = $item;
        }
    }

    public function removeItem(int $productId): void {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
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

    public function getTotalWithShippingAndDiscounts(): float {
        $total = $this->getTotalWithoutShipping();
        $totalWithDiscounts = $this->discountManager->applyDiscounts($total);
        return $totalWithDiscounts + $this->getShippingCost();
    }

    public function recalculateTotalAfterRemoval(int $productId): float {
        $this->removeItem($productId);
        return $this->getTotalWithShippingAndDiscounts();
    }
}
