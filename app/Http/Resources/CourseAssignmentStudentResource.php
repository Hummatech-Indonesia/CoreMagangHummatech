<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseAssignmentStudentResource extends JsonResource
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
            'course' => CourseResource::make($this->course),
            'title' => $this->title,
            'description' => $this->description,
            'is_submitted' => $this->submitTasks->count() == 0 ? false : true,
            'answer' => $this->submitTasks->count() == 0 ? null : SubmitTaskResource::make($this->submitTasks[0]),
        ];
    }
}
