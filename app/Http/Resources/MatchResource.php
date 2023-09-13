<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
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
            'id_student' => $this->id_student,
            'id_practice' => $this->id_practice,
            'date'=>$this->date,
            'pratice_name'=>$this->practice->name,
            'pratice_obj'=>$this->practice,
            'student_name'=>$this->student->name,
            'company_name'=>$this->practice->company->name,
            'ratings'=>$this->ratings,
            
        ];
    }
}
