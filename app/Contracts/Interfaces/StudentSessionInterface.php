<?php

namespace App\Contracts\Interfaces;

interface StudentSessionInterface
{
    public function changeSession(mixed $data, int $session);
}
