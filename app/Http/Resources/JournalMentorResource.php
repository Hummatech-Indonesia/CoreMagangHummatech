<?php

namespace App\Http\Resources;

use Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JournalMentorResource extends JsonResource
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
            'name' => $this->student->name,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image == "Kosong.png" ? null : asset('storage/' . $this->image),
            'status' => $this->status,
            'date' => $this->created_at,
            'time' => Carbon::parse($this->created_at)->format('H:i',)
        ];
    }
}
