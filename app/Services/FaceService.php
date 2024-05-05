<?php

namespace App\Services;

use App\Http\Requests\FaceRequest;
use App\Http\Requests\StoreFaceRequest;
use App\Models\Employee;
use App\Models\Face;
use App\Models\Student;
use App\Services\Traits\UploadTrait as TraitsUploadTrait;
use App\Traits\UploadTrait;

class FaceService {

    use TraitsUploadTrait;

    public function store(StoreFaceRequest $request): array
    {
        $data = $request->validated();
        $newPhoto = [];

        foreach ($request->file('photo') as $photo) {
            array_push($newPhoto, $photo->store('faces', 'public'));
        }
        $data['photo'] = $newPhoto;
        return $data;
    }
    public function update(StoreFaceRequest $request, Face $face): array
    {
        $data = $request->validated();
        $newPhoto = [];

        foreach ($face->faces as $face) {
            $this->remove($face->photo);
        }

        foreach ($request->file('photo') as $photo) {
            array_push($newPhoto, $photo->store('faces', 'public'));
        }
        $data['photo'] = $newPhoto;
        return $data;
    }
}
