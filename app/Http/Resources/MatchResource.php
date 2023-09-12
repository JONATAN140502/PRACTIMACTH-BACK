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
            'date'=>$this->date,
            'id_practice' => $this->id_practice,
            'pratice_name'=>$this->practice->name,
            'id_student' => $this->id_student,
            'student_name'=>$this->student->name,
            'company_name'=>$this->practice->company->name,
            'ratings'=>$this->ratings
            
        ];
    }
}
