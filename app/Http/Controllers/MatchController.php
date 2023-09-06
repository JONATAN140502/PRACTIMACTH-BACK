<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    
    protected function filterPractices(Request $request)
    {   ///Obtener la lista de knowdleges de los estudiantes
        $Knowledge_studiants = \App\Models\Knowledge_student::with('studiants')->where('id_student',$request->filter_student_id)->get();
        //$dataKnowledges = KnowledgeResource::collection($Knowledge);
        
        /** Obtner la lista (con duplicados) de practicas con esos conocimientos */
        $Knowledge_practices = \App\Models\Knowledge_practice::with('practices')->where('id_knowledges',$Knowledge_studiants[0])->get();
        $list_knowledge_filter = [];

        foreach ($Knowledge_practices as $key) {
            foreach ($Knowledge_studiants as $Knowledge_item) {
                if ($key->id_knowledge==$Knowledge_item) {
                    # code...
                }
            }
            
        }
        //


    }
}
