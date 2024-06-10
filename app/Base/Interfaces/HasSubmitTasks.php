<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasSubmitTasks
{
    /**
     * submitTasks
     *
     * @return HasMany
     */
    public function submitTasks(): HasMany;
}
