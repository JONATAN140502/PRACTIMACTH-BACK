<?php

namespace App\Http\Controllers;
use App\Models\{Knowledges_student, KnowledgePractice, practice};
use App\Http\Resources\KnowledgesStudentResource;
use Illuminate\Http\Request;

class MatchController extends Controller
{

    protected function filterPractices(Request $request)
    {   //Obtener la lista de knowdleges de los estudiantes
        $Knowledges = $this->filterKnowledge($request);
        $cantidadMinima=0;
        $listaGeneral=[];
        foreach ($Knowledges as $key) {
            $respuesta = KnowledgePractice::where('id_knowledges',$key)->get();
            if(count($respuesta)!=0){
                $listaGeneral[]=$respuesta[0]['id_practice'];
            }
            
        }
        //contar cuantas veces se repite
        $array=array_count_values($listaGeneral);
        arsort($array);
        $practiceArray=[];
        foreach ($array as $key => $value) {
            $practice= Practice::where('id',$key)->where('status',1)->get();
            $practiceArray[]=$practice[0];
        }
        return  $practiceArray;
    }

    function filterKnowledge(Request $request)
    {   
        $Knowledge = Knowledges_student::with('studiant')->where('id_student',$request->filter_student)->get();
        $array = [];
        foreach ($Knowledge as $value) {
            $array[]=$value['id_knowledges'];
        }
        return $array;
        
    }

}
