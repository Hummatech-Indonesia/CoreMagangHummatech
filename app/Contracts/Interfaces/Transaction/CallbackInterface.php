<?php

namespace App\Contracts\Interfaces\Transaction;

use Illuminate\Http\Request;

interface CallbackInterface
{
    public function callback(Request $request): mixed;
}
