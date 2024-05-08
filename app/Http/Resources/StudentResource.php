<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'email' => $this->email,
            'url' => asset("storage/".$this->avatar),
            'photo' => asset("storage/".$this->avatar),
            'national_student_number' => $this->identify_number,
            'classroom' => $this->class,
            'school' => $this->school,
            'rfid' => $this->rfid,
            'gender' => $this->gender,
            'address' => $this->address,
            'phone_number' => $this->phone,
            'role' => $this->hasOneUser->roles->pluck('name')->toArray()[0],
            'created_at' => Carbon::parse($this->created_at)->locale('id_ID')->isoFormat('DD MMMM Y'),
            'updated_at' => Carbon::parse($this->updated_at)->locale('id_ID')->isoFormat('DD MMMM Y'),
        ];
    }
}
