<?php
// app\Http\Controllers\FacultyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\School;
use App\Http\Resources\FacultyResource;
use Exception;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    protected function index(Request $request)
    {
        $faculties = Faculty::orderBy('name', 'ASC')->get();
        $data = FacultyResource::collection($faculties);
        $schools = School::where('id_faculty', $request->faculty)
        ->orderBy('name', 'ASC')
        ->get();
        return response()->json(['data' => $data,'schools'=>$schools], 200);
    }
    protected function filter(Request $request)
    { 
        $schools = School::where('id_faculty', $request->faculty)
        ->orderBy('name', 'ASC')
        ->get();
        return response()->json(['schools'=>$schools], 200);
    }
    protected function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $faculty = Faculty::create([
                'code' => $request->code,
                'name' => $request->name,
                'descripcion' => $request->descripcion,
                'state' => $request->state,
            ]);

            $data[] = $faculty;
            $resp = FacultyResource::collection($data);

            DB::commit();
            return response()->json(['state' => 0, 'data' => $resp], 200);
        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function update(Request $request)
    {
        try {
            DB::beginTransaction();
    
            $faculty = Faculty::findOrFail($request->id);
    
            $faculty->code = $request->code;
            $faculty->name = $request->name;
            $faculty->descripcion = $request->descripcion;
            $faculty->state = $request->state;
    
            $faculty->save();
    
            $data[] = $faculty;
            $resp = FacultyResource::collection($data);
    
            DB::commit();
            return response()->json(['state' => 0, 'data' => $resp], 200);
        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }
    
    protected function show($id)
    {
        $faculty = Faculty::find($id);
        return new FacultyResource($faculty);
    }
    
    protected function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
    
            Faculty::where('id', $request->id)->delete();
    
            DB::commit();
            return response()->json(['state' => 0, 'id' => $request->id], 200);
        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }
    
}
