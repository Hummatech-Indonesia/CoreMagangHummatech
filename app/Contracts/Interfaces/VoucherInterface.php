<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereSingleInterface;

interface VoucherInterface extends GetInterface, StoreInterface, DeleteInterface, UpdateInterface
{
    /**
     * Get the voucher code based on code
     *
     * @param string $code The Voucher Code
     * @return mixed
     */
    public function getVoucherByCode(string $code): mixed;
}
