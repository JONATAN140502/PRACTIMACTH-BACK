<?php

namespace App\Http\Controllers;
use App\Models\{Knowledges_student, KnowledgePractice, practice, match};
use App\Http\Resources\{KnowledgesStudentResource, MatchResource};
use Illuminate\Http\Request;

class MatchController extends Controller
{

    protected function store(Request $request){
        //registrar el match 
        try{\DB::commit();
            $match = Macth::create([
                'id_practice'=>$request->id_practice,
                'id_student'=>$request->id_student,
                'date'=>date("Y-m-d H:i:s"),
                'state'=>1,
                'ratings'=>'0',
            ]);
            return response()->json(['state' => 0], 200);
        } catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
        
    }
    protected function destroy(Request $request){
        try {
            \DB::beginTransaction();
            Practice::where('id', $request->id)->delete();
            \DB::commit();
            return \response()->json(['state' => 0, 'id' => $request->id], 200);

        } catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

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

    protected function myMatchs(Request $request){
        $request->labelFilter='student'?$filterColumn='id_student':$filterColumn='id_practice';
        $myMatch=Match::with('$request->labelFilter')->where($filterColumn,$request->valueFilter)->where('state',1)->get();
        $data=MatchResource::collection(collect([$myMatch]));
        return $data;
    }

    protected function show($id)
    {
        $match = Match::find($id);
        $data = MatchResource::collection(collect([$match]));
        return $data;
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
