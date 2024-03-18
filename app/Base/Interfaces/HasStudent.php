<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasStudent {
    /**
     * student
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo;
}
