<?php

namespace App\Http\Controllers;
use App\Http\Resources\SpecialtyResource;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    

    protected function index(Request $request){
        $Specialty = \App\Models\Specialty::with('area')->orderBy('name', 'ASC')->get();
        $data = SpecialtyResource::collection($Specialty);
        return \response()->json(['data' => $data], 200);
    }

    protected function filter(Request $request)
    {
        $Specialty = \App\Models\Specialty::with('area')->get();
        $data = SpecialtyResource::collection($Specialty);
        return response()->json(['data' => $data], 200);
    }

    protected function store(Request $request){
        try{
            \DB::beginTransaction();
            $Specialty = \App\Models\Specialty::create([
                'name' => strtoupper(trim($request->name)),
                'descripcion'=>strtoupper(trim($request->descripcion)),
                'id_area'=>$request->id_area,
                'state' => 1,
            ]);
            $data[] = $Specialty;
            $resp = SpecialtyResource::collection($data);
            \DB::commit();
            return \response()->json(['state' => 0, 'data' => $resp], 200);

        }catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function update(Request $request){
        try{
            $SpecialtyObj= \App\Models\Specialty::find($request->id);
            $SpecialtyObj->name = strtoupper(trim($request->name));
            $SpecialtyObj->state = strtoupper(trim($request->state));
            $SpecialtyObj->id_area=$request->id_area;
            $SpecialtyObj->save();
            $data[] = $SpecialtyObj;
            $resp = SpecialtyResource::collection($data);
            \DB::commit();
            return \response()->json(['state' => 0, 'data' => $resp], 200);


        }catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function show($id)
    {
        $Specialty_name = \App\Models\Specialty::with('area')->find($id);
        $data = SpecialtyResource::collection(collect([$Specialty_name]));
        return $data;
    }

    protected function destroy(Request $request){
        try {
            \DB::beginTransaction();
            $Specialty = \App\Models\Specialty::where('id', $request->id)->delete();
            \DB::commit();
            return \response()->json(['state' => 0, 'id' => $request->id], 200);

        } catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }

    }
}
