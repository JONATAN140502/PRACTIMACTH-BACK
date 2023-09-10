<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PracticeResource extends JsonResource
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
            'date'=>$this->date,
            'modalidad'=>$this->modalidad,
            'descripcion'=>$this->descripcion,
            'state' => $this->state,
            'status'=>$this->status,
            'workload'=>$this->workload,
            'vacant'=>$this->vacant,
            'id_company'=>$this->id_company,
            'name_company'=>$this->company->name,
            'descripcion'=>$this->descripcion,
            'views'=>$this->views,

        ];
    }
}
