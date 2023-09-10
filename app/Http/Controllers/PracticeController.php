<?php

namespace App\Http\Controllers;
use App\Http\Resources\PracticeResource;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    

    protected function index(Request $request){
        $Practice = \App\Models\Practice::with('company')->orderBy('id', 'ASC')->get();
        $data = PracticeResource::collection($Practice);
        return \response()->json(['data' => $data], 200);
    }

    //Pasar los distintos tipos de filtros
    protected function filter(Request $request)
    {
        $Practice = \App\Models\Practice::with('company')->where('.$request->labelFilter.',$request->filter)->get();
        $data = PracticeResource::collection($Practice);
        return response()->json(['data' => $data], 200);
    }

    protected function store(Request $request){
        try {
            \DB::beginTransaction();

            $practice = \App\Models\Practice::create([
                'name' => $request->name,
                'date' => $request->date,
                'modalidad' => $request->modalidad,
                'descripcion' => $request->descripcion,
                'state' => 1,
                'status' => 1, //proceso abierto
                'workload' => $request->workload,
                'vacant' => $request->vacant,
                'views' => 0,
                'id_company' => $request->id_company,
            ]);
            //Registar en la tabla relacional Knowledge
            $knowledges = $request->knowledges;
            $knowledges_array=explode(", ", $knowledges);
            foreach ($knowledges_array as $value) {
                \App\Models\Knowledge_practice::create([
                    'id_knowledges'=>$value,
                    'id_practice'=>$practice->id,
                ]);
            }
            \DB::commit();
            return response()->json(['state' => 0], 200);
        } catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function update(Request $request)
    {
        try {
            DB::beginTransaction();
    
            $practice = Practice::findOrFail($request->id);
    
            $practice->name = $request->name;
            $practice->modalidad = $request->modalidad;
            $practice->descripcion = $request->descripcion;
            $practice->status = $request->status;
            $practice->save();
            $data[] = $practice;
            $resp = PracticeResource::collection($data);
            //editar la tabla relacional
            $data_knowledges_update = $request->knowledges; //se pasara como un array
            $data_knowledges=  Knowledge_practice::where('id_practice',$request->id)->get();
            foreach ($data_knowledges_update as $value_l1) {
                if (!in_array($value_l1, $data_knowledges)) {
                    //si no pertenece a la data actual
                    Knowledge_practice::create([
                        'id_knowledges'=>$value_l1,
                        'id_practice'=>$practice->id,
                    ]);
                }
            }
            foreach ($data_knowledges as $value) {
                if (!in_array($value, $data_knowledges_update)) {
                    //si no pertenece a la data nueva, eliminarla
                    Knowledge_practice::where('id_knowledges', $value)->delete();
                }
            }
            DB::commit();
            return response()->json(['state' => 0, 'data' => $resp], 200);
        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    
}
