<?php

class Cart
{
    private $items = [];
    private $totalValue = 0;
    private $shippingCost = 15;
    private $freeShippingThreshold = 200;

    public function addItem(array $item)
    {
        $productId = $item['product_id'];

        if (isset($this->items[$productId])) {
            $this->items[$productId]['qty'] += $item['qty'];
        } else {
            $this->items[$productId] = $item;
        }

        $this->recalculateTotal();
    }

    private function recalculateTotal()
    {
        $this->totalValue = 0;
        foreach ($this->items as $item) {
            $this->totalValue += $item['price'] * $item['qty'];
        }
    }

    private function calculateShippingCost()
    {
        if ($this->totalValue > $this->freeShippingThreshold) {
            $this->shippingCost = 0;
        } else {
            $this->shippingCost = 15;
        }
    }

    public function getShippingCost()
    {
        $this->calculateShippingCost();
        return $this->shippingCost;
    }

    public function getTotalValue()
    {
        return $this->totalValue + $this->getShippingCost();
    }

    public function getItems()
    {
        return $this->items;
    }
}