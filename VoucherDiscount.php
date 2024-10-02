<?php

class VoucherDiscount implements DiscountStrategyInterface {
    private $validVouchers;
    private $voucherCode;
    private $discounts;

    public function __construct(array $validVouchers, string $voucherCode, array $discounts) {
        $this->validVouchers = $validVouchers;
        $this->voucherCode = $voucherCode;
        $this->discounts = $discounts;
    }

    public function applyDiscount(float $total): float {
        if (in_array($this->voucherCode, $this->validVouchers)) {
            foreach ($this->discounts as $threshold => $percentage) {
                if ($total >= $threshold) {
                    return $total * (1 - $percentage / 100);
                }
            }
        }
        return $total;
    }
}
