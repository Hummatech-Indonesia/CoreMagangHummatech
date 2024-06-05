<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'status' => $this->status,
            'image' => $this->image,
            'description' => $this->description,
            'division' => DivisionResource::make($this->division),
            'position' => $this->position,
            'sub_courses' => SubCourseResource::collection($this->subCourses),
        ];
    }
}
