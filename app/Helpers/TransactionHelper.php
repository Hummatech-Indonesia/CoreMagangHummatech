<?php

namespace App\Helpers;

class TransactionHelper
{
    private static float $taxRatio = 11 / 100;

    /**
     * Method to counting the tax
     *
     * @param float $amount the amount for which tax will be calculated
     * @return float
     */
    public static function countTax($amount): float
    {
        return ($amount * self::$taxRatio) + $amount;
    }

    /**
     * Method to calculate the discount
     *
     * @param int $amount the amount for which discount will be calculated
     * @param int $discount the discount will be count int percentage
     *
     * @return float|int the amount after discount
     */
    public static function discountSubtotal(int $amount, float $discount): mixed
    {
        if ($discount === 0) {
            return $amount;
        }

        return $amount - ($amount * ($discount / 100));
    }
}
