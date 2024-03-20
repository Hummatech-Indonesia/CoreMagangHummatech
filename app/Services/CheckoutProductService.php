<?php

namespace App\Services;

class CheckoutProductService
{
    /**
     * Adding the product to the cart
     *
     * @param int $id The target ID of the product
     */
    public function add(int $id)
    {
        session()->push('cart-product', $id);
    }

    /**
     * Removing the product from the cart based on ID
     *
     * @param int $id The target ID of the product
     */
    public function remove(int $id)
    {
        session()->pull('cart-product', $id);
    }
}
