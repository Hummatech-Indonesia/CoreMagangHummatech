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
}
