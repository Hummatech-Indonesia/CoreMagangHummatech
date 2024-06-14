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
            'avatar' => $this->student->avatar == null ? null : asset('storage/' . $this->student->avatar),
            'division' => $this->division->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'theme' => HummataskProjectResource::collection($this->projects),
            'teams' => StudentTeamResource::collection($this->studentTeams),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
