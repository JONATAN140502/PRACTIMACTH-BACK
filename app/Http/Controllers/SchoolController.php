<?php
// app\Http\Controllers\SchoolController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Http\Resources\SchoolResource;
use Exception;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{ 
    protected function index(Request $request)
    {
        $schools = School::with('faculty')->orderBy('name', 'ASC')->get();
        $data = SchoolResource::collection($schools);
        return response()->json(['data' => $data], 200);
    }

    protected function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $school = School::create([
                'name' => $request->name,
                'code' => $request->code,
                'state' => $request->state,
                'id_faculty' => $request->id_faculty,
            ]);

            $data[] = $school;
            $resp = SchoolResource::collection($data);

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

        $school = School::findOrFail($request->id);

        $school->name = $request->name;
        $school->code = $request->code;
        $school->state = $request->state;
        $school->id_faculty = $request->id_faculty;

        $school->save();

        $data[] = $school;
        $resp = SchoolResource::collection($data);

        DB::commit();
        return response()->json(['state' => 0, 'data' => $resp], 200);
    } catch (Exception $e) {
        DB::rollback();
        return ['state' => '1', 'exception' => (string) $e];
    }
}


    protected function show($id)
    {
        $school = School::find($id);
        return new SchoolResource($school);
    }

    protected function destroy(Request $request)
    {
        try {
            DB::beginTransaction();

            School::where('id', $request->id)->delete();

            DB::commit();
            return response()->json(['state' => 0, 'id' => $request->id], 200);
        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }
}
