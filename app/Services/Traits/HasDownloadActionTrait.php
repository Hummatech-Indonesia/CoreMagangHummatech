<?php

namespace App\Services\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

trait HasDownloadActionTrait
{
    public function download(mixed $model): Response
    {
        $filePath = "public/{$model->file}";
        $fileContent = Storage::get($filePath);
        $filename = basename($model->file);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $subCourseName = $model->task->subCourse->title;
        $courseTitle = $model->task->subCourse->course->title;
        $userName = auth()->user()->name;
        $currentDate = now()->format('d-m-Y_H-i-s');

        $fullDownloadName = "{$currentDate}_{$userName}_{$courseTitle}_{$subCourseName}_{$filename}";

        if ($extension) {
            $fullDownloadName .= ".$extension";
        }

        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $fullDownloadName . '"',
        ];

        return response($fileContent, 200, $headers);
    }
}
