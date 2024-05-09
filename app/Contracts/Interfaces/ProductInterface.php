<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\WhereSingleInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface ProductInterface extends GetInterface, StoreInterface, DeleteInterface, UpdateInterface, WhereSingleInterface
{
    
    /**
     * Get Products Based on Division
     *
     * @param int $division the ID of division that attached into user
     * @return mixed
     */
    public function getProductsBasedOnDivision(int $division): mixed;
}
