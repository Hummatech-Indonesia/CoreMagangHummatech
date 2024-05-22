<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JournalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        setlocale(LC_TIME, 'id_ID.utf8');

        return [
            'name' => $this->student->name,
            'internship_type' => $this->student->internship_type,
            'school' => $this->student->school,
            'title' => $this->title,
            'description' => $this->description,
            'image' => asset('storage/'. $this->image),
            'created_at' => strftime("%d %B %Y", strtotime($this->created_at)),
        ];
    }
}
