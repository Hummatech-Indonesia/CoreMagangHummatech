<?php

namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface DownloadInterface
{
    /**
     * Download file response
     *
     * @return BinaryFileResponse
     */
    public function download(Model $model): BinaryFileResponse;
}
