<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HummataskTeamResource extends JsonResource
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
            'name' => $this->name,
            'image' => $this->image == null ? null : asset('storage/' . $this->image),
            'category_project' => $this->categoryProject->name,
            'student' => $this->student->name,
            'division' => $this->division->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'teams' => StudentTeamResource::collection($this->studentTeams),
        ];
    }
}
