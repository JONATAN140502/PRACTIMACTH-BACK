<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'ruc' => $this->ruc,
            'correo' => $this->correo,
            'business_name' => $this->business_name,
            'address' => $this->address,
            'district' => $this->district,
            'province' => $this->province,
            'department' => $this->department,
            'phone' => $this->phone,
            'descripcion' => $this->descripcion,
            'valoration' => $this->valoration,
            'user_name' => $this->user_name,
            'password' => $this->password,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
