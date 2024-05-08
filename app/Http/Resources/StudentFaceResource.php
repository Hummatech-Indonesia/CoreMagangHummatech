<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentFaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $faceResources = FaceResource::collection($this->faces);
        $faceResourcesArray = $faceResources->toArray($request);
        return [
            'rfid' => $this->rfid,
            'md5' => md5(json_encode($faceResourcesArray)),
            'faces' => FaceResource::collection($this->faces),
        ];
    }
}
