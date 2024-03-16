<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\PaymentInterface as EloquentPaymentInterface;
use App\Contracts\Interfaces\Eloquent\TransactionInterface;

interface PaymentInterface extends EloquentPaymentInterface , TransactionInterface
{}
