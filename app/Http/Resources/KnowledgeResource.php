<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KnowledgeResource extends JsonResource
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
            'descripcion'=>$this->descripcion,
            'state' => $this->state,
            'id_subspecialty'=>$this->id_idsubspecialty,
            'name_subspecialty'=>$this->subspecialty->name,
        ];
    }
}
