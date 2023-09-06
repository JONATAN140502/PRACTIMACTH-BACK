<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubspecialtyResource;
use Illuminate\Http\Request;

class SubspecialtyController extends Controller
{

    protected function index(Request $request){
        $Subspecialty = \App\Models\SubSpecialty::with('specialty.area')->orderBy('name', 'ASC')->get();
        $data = SubspecialtyResource::collection($Subspecialty);
        return \response()->json(['data' => $data], 200);
    }

    protected function filter(Request $request)
    {
        $Subspecialty = \App\Models\SubSpecialty::with('specialty')->get();
        $data = SubspecialtyResource::collection($Subspecialty);
        return response()->json(['data' => $data], 200);
    }

    protected function store(Request $request){
        try{
            \DB::beginTransaction();
            $Subspecialty = \App\Models\SubSpecialty::create([
                'name' => strtoupper(trim($request->name)),
                'descripcion'=>strtoupper(trim($request->descripcion)),
                'id_specialty'=>$request->id_specialty,
                'state' => 1,
            ]);
            $data[] = $Subspecialty;
            $resp = SubspecialtyResource::collection($data);
            \DB::commit();
            return \response()->json(['state' => 0, 'data' => $resp], 200);

        }catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function update(Request $request){
        try{
            $SubspecialtyObj= \App\Models\SubSpecialty::find($request->id);
            $SubspecialtyObj->name = strtoupper(trim($request->name));
            $SubspecialtyObj->state = strtoupper(trim($request->state));
            $SubspecialtyObj->id_specialty=$request->id_specialty;
            $SubspecialtyObj->save();
            $data[] = $SubspecialtyObj;
            $resp = SubspecialtyResource::collection($data);
            \DB::commit();
            return \response()->json(['state' => 0, 'data' => $resp], 200);


        }catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function show($id)
    {
        $Subspecialty = \App\Models\SubSpecialty::with('specialty')->find($id);
        $data = SubspecialtyResource::collection(collect([$Subspecialty]));
        return $data;
    }

    protected function destroy(Request $request){
        try {
            \DB::beginTransaction();
            $Subspecialty = \App\Models\SubSpecialty::where('id', $request->id)->delete();
            \DB::commit();
            return \response()->json(['state' => 0, 'id' => $request->id], 200);

        } catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }

    }
}
