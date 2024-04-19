<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

/**
 * Cart Helper Class
 *
 * This class is used to manipulate data into the cart session data. This code is replacing Laravel 10 Cart Package that not supported on Laravel 11 and porting the system into Laravel 11.
 *
 * Sample Code:
 * 1. ```CartHelper::add(true, $id, $name, $price, $amount, $image)```
 * 2. ```CartHelper::add(false, $id, $name, $price, $amount, $image)```
 * 3. ```CartHelper::add(true, ['id' => $id, 'name' => $name, 'price' => $price, 'amount' => $amount, 'image' => $image])```
 * 4. ```CartHelper::add(false, ['id' => $id, 'name' => $name, 'price' => $price, 'amount' => $amount, 'image' => $image])```
 * 5. ```CartHelper::remove($id)```
 * 6. ```CartHelper::updateQty($id, $amount)```
 * 7. ```CartHelper::updatePrice($id, $price)```
 * 8. ```CartHelper::subtotal()```
 * 9. ```CartHelper::total()```
 * 10. ```CartHelper::count()```
 * 11. ```CartHelper::get()```
 * 12. ```CartHelper::isEmpty()```
 * 13. ```CartHelper::isNotEmpty()```
 * 14. ```CartHelper::truncate()```
 *
 * @package pkl-hummatech
 * @since 1.0.0
 * @author PKL Hummatech <pkl@hummatech.com>
 * @author cakadi190 <cakadi190@gmail.com>
 */
class CartHelper
{
    /**
     * The cart data instance
     *
     * @var \Illuminate\Support\Collection $cart
     */
    private static Collection $cart;

    /**
     * Tax amount instance
     *
     * @var float $tax
     */
    private static float $tax;

    /**
     * Subtotal price instance
     *
     * @var float $subtotal
     */
    private static float $subtotal;

    public static function initialize(): void
    {
        self::$tax = 0.11;
        self::$cart = collect(session()->get('cart', []));
        self::$subtotal = self::$cart->sum(fn (mixed $item) => $item['price'] * $item['amount']);
    }

    /**
     * Check if multidimensional array
     *
     * @see https://stackoverflow.com/a/145348/17911271
     * @return bool The result of checking
     */
    private static function isMultidimensionalArray(mixed $array): bool
    {
        return count($array) !== count($array, COUNT_RECURSIVE);
    }

    /**
     * Add data to cart
     *
     * @param bool $withTax The cart tax if need
     * @param mixed ...$data The cart data
     * @return void The cart data
     */
    public static function add(bool $withTax, mixed ...$data): void
    {
        self::initialize();

        if (self::isMultidimensionalArray($data[0])) {
            foreach($data as $value) {
                self::$cart->push($value);
            }
        } else if(!self::isMultidimensionalArray($data[0])) {
            self::$cart->push($data[0]);
        } else {
            self::$cart->push([
                'id' => $data[0],
                'name' => $data[1],
                'price' => $data[2],
                'amount' => $data[3],
                'image' => $data[4],
                'option' => $data[5]
            ]);
        }

        if ($withTax) {
            self::$cart->transform(function ($item) {
                $item['tax'] = $item['price'] * self::$tax;
                return $item;
            });
        }

        session()->put('cart', self::$cart->toArray());
    }

    /**
     * Truncating all session cart data
     *
     * @return void
     */
    public static function truncate()
    {
        self::initialize();

        session()->put('', self::$cart->toArray());
    }

    /**
     * Get list of cart
     *
     * @return Collection The cart data
     */
    public static function get()
    {
        self::initialize();
        
        return self::$cart;
    }

    /**
     * Update data quantity in cart
     *
     * @param string $id The cart data id
     * @param int $amount The new amount
     * @return void
     */
    public function updateQty(string $id, int $amount): void
    {
        self::initialize();

        self::$cart->where('id', $id)->first()['amount'] = $amount;
        session()->put('cart', self::$cart->toArray());
    }

    /**
     * Update data price in cart
     *
     * @param string $id The cart data id
     * @param int $price The new price
     * @return void
     */
    public static function updatePrice(string $id, int $price): void
    {
        self::initialize();

        self::$cart->where('id', $id)->first()['price'] = $price;
        session()->put('cart', self::$cart->toArray());
    }

    /**
     * Get Subtotal price
     *
     * @return float
     */
    public static function subtotal(): int|float
    {
        self::initialize();

        return self::$subtotal;
    }

    /**
     * Count of cart item
     *
     * @return int
     */
    public static function count(): int|float
    {
        self::initialize();

        return self::$cart->count();
    }

    /**
     * Check if is not empty
     *
     * @return bool
     */
    public static function isNotEmpty(): bool
    {
        self::initialize();

        return self::$cart->count() > 0;
    }

    /**
     * Check if is not empty
     *
     * @return bool
     */
    public static function isEmpty(): bool
    {
        self::initialize();

        return self::$cart->count() === 0;
    }

    /**
     * Count total with tax
     *
     * @return float
     */
    public static function total(): int|float
    {
        self::initialize();

        return (self::$subtotal * self::$tax) + self::$subtotal;
    }

    /**
     * Remove data from cart
     *
     * @param mixed $id The cart data id
     * @return void
     */
    public static function remove(string $id): void
    {
        self::initialize();

        self::$cart->forget($id);

        session()->put('cart', self::$cart->toArray());
    }
}
