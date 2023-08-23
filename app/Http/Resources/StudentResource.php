<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'code' => $this->code,
            'dni' => $this->dni,
            'correo' => $this->correo,
            'phone' => $this->phone,
            'id_school' => $this->id_school,
            'skills' => $this->skills,
            'state' => $this->state,
            'cicle' => $this->cicle,
            'user_name' => $this->user_name,
            'password' => $this->password,
            'last_access' => $this->last_access,
            'id_faculty' => $this->school->faculty->id,
            'faculty_name' => $this->school->faculty->name,
            'school_name' => $this->school->name,
        ];
    }
}
