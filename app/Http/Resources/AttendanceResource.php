<?php

namespace App\Http\Resources;

use Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'student_id' => $this->student_id,
            'status' => $this->status,
            'is_admin' => $this->is_admin,
            'created_at' => $this->created_at,
            'time' => Carbon::parse($this->created_at)->format('H:i:s'),
            'updated_at' => $this->updated_at,
        ];
    }
}
