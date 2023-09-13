<?php

namespace App\Http\Controllers;

use App\Http\Resources\MatchResource;
use App\Http\Resources\StudentResource;
use App\Models\KnowledgePractice;
use App\Models\Knowledges_student;
use App\Models\Match;
use App\Models\Student;
use App\Models\Practice;
use Illuminate\Http\Request;

class MatchController extends Controller
{

    protected function practicesMatch (Request $request){
        $Practice = \App\Models\Practice::with('company')->where('id_company',$request->id)->get();
        $data=[];
        foreach ($Practice as $value) {
            $respuesta = Match::with('practice')->where('id_practice', $value['id'])->where('state', 1)->get();
            if(count($respuesta) != 0){
                //existe
                $data[]=$value;

            }

        }
        return $data;

    }
    protected function store(Request $request)
    {
        //registrar el match
        try {\DB::commit();
            $match = Match::create([
                'id_practice' => $request->id_practice,
                'id_student' => $request->id_student,
                'date' => date("Y-m-d H:i:s"),
                'state' => 1,
                'ratings' => '0',
            ]);
            return response()->json(['state' => 0], 200);
        } catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }

    }
    protected function destroy(Request $request)
    {
        try {
            \DB::beginTransaction();
            Match::where('id', $request->id)->delete();
            \DB::commit();
            return \response()->json(['state' => 0, 'id' => $request->id], 200);

        } catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function filterPractices(Request $request)
    { //Obtener la lista de knowdleges de los estudiantes
        $Knowledges = $this->filterKnowledge($request);
        $cantidadMinima = 0;
        $listaGeneral = [];
        foreach ($Knowledges as $key) {
            $respuesta = KnowledgePractice::where('id_knowledges', $key)->get();
            if (count($respuesta) != 0) {
                $listaGeneral[] = $respuesta[0]['id_practice'];
            }

        }
        //contar cuantas veces se repite
        $array = array_count_values($listaGeneral);
        arsort($array);
        $practiceArray = [];
        foreach ($array as $key => $value) {
            $practice = Practice::where('id', $key)->where('status', 1)->get();
            $practiceArray[] = $practice[0];
        }
        return $practiceArray;
    }

    protected function myMatches(Request $request)
    {
        if ($request->type == 'student') {
            $myMatch = Match::with('student')->where('id_student', $request->valueFilter)->where('state', 1)->get();
            $data = MatchResource::collection($myMatch);
        } else {
            //mostrar la lista de estudiantes
            $array=Match::where('id_practice', $request->valueFilter)->where('state', 1)->get();
            $arrayId=[];$data=[];
            foreach ($array as $value) {
                $arrayId[]=$value['id_student'];
            }
            //buscar el estudiante
            foreach ($arrayId as $id) {
                $student = Student::find($id);
                $data[] = StudentResource::collection([$student])[0];
            }
        }
        return $data;
    }

    protected function show($id)
    {
        $match = Match::find($id);
        $data = MatchResource::collection(collect([$match]));
        return $data;
    }

    public function filterKnowledge(Request $request)
    {
        $Knowledge = Knowledges_student::with('studiant')->where('id_student', $request->filter_student)->get();
        $array = [];
        foreach ($Knowledge as $value) {
            $array[] = $value['id_knowledges'];
        }
        return $array;

    }

}
