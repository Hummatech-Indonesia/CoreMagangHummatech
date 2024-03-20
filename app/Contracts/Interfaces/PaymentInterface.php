<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Transaction\TransactionInterface;
use App\Contracts\Interfaces\Transaction\CallbackInterface;
use App\Contracts\Interfaces\Transaction\GetPaymentDetailInterface;
use App\Contracts\Interfaces\Transaction\PaymentChannelInterface;

interface PaymentInterface extends PaymentChannelInterface, TransactionInterface, CallbackInterface, GetPaymentDetailInterface
{}
