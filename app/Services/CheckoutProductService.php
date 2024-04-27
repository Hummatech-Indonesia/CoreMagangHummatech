<?php

namespace App\Services;

use App\Models\Product;
use Cart;
use Illuminate\Support\Str;

class CheckoutProductService
{
    /**
     * Adding the product to the cart
     *
     * @param int $id The target ID of the product
     */
    public function add(mixed $data)
    {
        $subscribe = Product::findOrFail($data->id);

        $data = [
            'id' => Str::random(16),
            'name' => $subscribe->name,
            'price' => $subscribe->price,
            'amount' => 1,
            'image' => asset("/storage/{$subscribe->image}"),
            'option' => [
                'target_table' => 'subscribe',
                'id' => $subscribe->id,
            ],
        ];

        if(Cart::isNotEmpty()) {
            Cart::truncate();
        }

        Cart::add(false, $data);
    }
}
