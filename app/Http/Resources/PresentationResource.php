<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PresentationResource extends JsonResource
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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'schedule_to' => $this->schedule_to,
            'hummatask_team_id' => $this->hummatask_team_id,
            'mentor_id' => $this->mentor_id,
            'status_presentation' => $this->status_presentation,
            'callback' => $this->callback,
            'title' => $this->title,
            'description' => $this->description,
            'already_used' => $this->hummatask_team_id == null ? false : true,
        ];
    }
}
