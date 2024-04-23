<?php

namespace App\Helpers;

class TransactionHelper
{
    private static float $taxRatio = 0.11;

    /**
     * Method to counting the tax
     *
     * @param float $amount the amount for which tax will be calculated
     * @param bool $withTax true if tax will be added to the amount
     * @return float
     */
    public static function countTax(float $amount, bool $withTax = false): float
    {
        if(!$withTax) {
            return ($amount * self::$taxRatio);
        }

        return ($amount * self::$taxRatio) + $amount;
    }

    /**
     * Count and show the calculation of discount
     *
     * @param int $amount the amount for which discount will be calculated
     * @param int $discount the discount will be count int percentage
     *
     * @return float|int the amount after discount
     */
    public static function discount(int $amount, float $discount): mixed
    {
        return $amount * ($discount / 100);
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

    /**
     * Change the amount to currency format
     *
     * @param int $amount the amount
     * @return string
     */
    public static function currencyFormatter(int $amount)
    {
        return "Rp " . number_format($amount, 0,',','.');
    }
}
