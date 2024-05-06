<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasProduct {

    /**
     * product
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo;
}
