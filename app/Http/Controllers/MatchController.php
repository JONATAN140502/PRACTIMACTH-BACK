<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{

    protected function filterPractices(Request $request)
    { ///Obtener la lista de knowdleges de los estudiantes
        $Knowledge_studiants = \App\Models\Knowledge_student::with('studiants')->where('id_student', $request->filter_student_id)->get();
        //$dataKnowledges = KnowledgeResource::collection($Knowledge);
        $cant_conocimientos = count($Knowledge_studiants);
        $similitudes_practicas = [];
        /** Obtner la lista (con duplicados) de practicas con esos conocimientos */

        foreach ($Knowledge_studiants as $value) {
            $Knowledge_practices = \App\Models\Knowledge_practice::with('practices')->where('id_knowledges', $value->id_knowledge)->get();
            $similitudes_practicas[] = $Knowledge_practices;
        }

        $list_idPractices = [];

        foreach ($similitudes_practicas as $value->id_practices) {
            if (!in_array($value, $list_idPractices)) {
                //si no pertenece a la lista, agregar
                $list_idPractices[] = $value;
            }
        }
        //queda una lista con id de practices
        $list_knowledge_filter = [];
        $cant = 0;

        $cant_repeticiones = array_count_values($similitudes_practicas);

        foreach ($cant_repeticiones as $key) {
            if ($key[1] == $cant_conocimientos || $key[1] >= $cant_conocimientos - 2) {
                $list_knowledge_filter[] = $key[0]; //retornar una lista con los id de las practicas qeu hace match
            }
        }

    }
}
