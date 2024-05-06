<?php

namespace App\Contracts\Interfaces\Eloquent;

interface SlugInterface
{
    /**
     * Handle show method and slug data instantly from models.
     *
     * @param mixed $id
     * @param array $data
     *
     * @return mixed
     */

     public function slug(mixed $slug): mixed;
}
