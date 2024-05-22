<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasSubCourse
{
    /**
     * sub course
     *
     * @return BelongsTo
     */
    public function subCourse(): BelongsTo;
}
