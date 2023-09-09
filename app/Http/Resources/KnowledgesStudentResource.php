<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KnowledgesStudentResource extends JsonResource
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
            'id_student' => $this->id_student,
            'id_knowledge'=>$this->id_knowledges,
            'name_knowledge'=>$this->knowledge->name,
        ];
    }
}
