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
        
        return [
            'name' => $this->student->name,
            'school' => $this->student->school,
            'title' => $this->title,
            'description' => $this->description,
            'image' => asset('storage/'. $this->image),
            'created_at' => $this->created_at
        ];
    }
}
