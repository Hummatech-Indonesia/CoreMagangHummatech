<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
        'avatar' => asset('storage/'. $this->avatar),
        'email' => $this->email,
        'phone' => $this->phone,
        'address' => $this->address,
        'gender' => $this->gender,
        'divisi' => $this->division ? $this->division->name : 'Tidak ada divisi',
        'school' => $this->school
       ];
    }
}
