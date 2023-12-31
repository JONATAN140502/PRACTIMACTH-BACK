<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Knowledges_student;
use App\Http\Resources\{StudentResource, KnowledgesStudentResource};
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    protected function index(Request $request)
    {
        $students = Student::with('school.faculty')->orderBy('name', 'ASC')->get();
       $data = StudentResource::collection($students);
        return response()->json(['data' => $data], 200);
    }

    protected function store(Request $request)
    {
        $hashedPassword = $request->password;

        try {
            DB::beginTransaction(); 

            $student = Student::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'code' => $request->code,
                'dni' => $request->dni,
                'correo' => $request->correo,
                'phone' => $request->phone,
                'id_school' => $request->id_school,
                'skills' => $request->skills, //viene como aaray
                'state' => 1,
                'cicle' => $request->cicle,
                'user_name' => $request->user_name,
                'password' => Hash::make($hashedPassword),
                'last_access' => now(), // Assuming you want to set the current time
            ]);

            $data[] = $student;
            $resp = StudentResource::collection($data);

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

            $student = Student::findOrFail($request->id);

            // Update the attributes
            $student->name = $request->name;
            $student->last_name = $request->last_name;
            $student->code = $request->code;
            $student->dni = $request->dni;
            $student->correo = $request->correo;
            $student->phone = $request->phone;
            $student->id_school = $request->id_school;
            $student->skills = $request->skills;
            $student->state = $request->state;
            $student->cicle = $request->cicle;
            $student->user_name = $request->user_name;

            // Check if password is provided and update if needed
            if ($request->has('password')) {
                $hashedPassword = $request->password;
                $student->password = Hash::make($hashedPassword);
            }

            $student->last_access = now();
            $student->save();

            $data[] = $student;
            $resp = StudentResource::collection($data);

            DB::commit();
            return response()->json(['state' => 0, 'data' => $resp], 200);
        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function show($id)
    {
        $student = Student::find($id);
        $Knowledge = Knowledges_student::with('studiant')->where('id_student',$id)->get();
        $respuesta=KnowledgesStudentResource::collection($Knowledge);
        return response()->json(['data' => new StudentResource($student),'knowledge'=>$respuesta], 200);
        
    }

    protected function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            // desactivar el estudiante
            Student::where('id', $request->id)->delete();

           //desactivar su conocimiento del estudiante 
            $Knowledges_student= \App\Models\Knowledges_student::where('id_student', $request->id_student)->delete();
           
            DB::commit();
            return response()->json(['state' => 0, 'id' => $request->id], 200);
           
        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }
    protected function storeknowledge(Request $request)
    {
        try {
            DB::beginTransaction();
            //Registar en la tabla relacional Knowledge
            $knowledges = $request->knowledges;
            //$knowledges_array=explode(", ", $knowledges);
            foreach ($knowledges as $value) {
                KnowledgePractice::create([
                    'id_knowledges'=>$value,
                    'id_student'=> $request->id_student,
                    'state'=>1,
                ]);
            }
            DB::commit();
            return response()->json(['state' => 0, 'data' =>$knowledge_student], 200);
        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function filterKnowledge(Request $request)
    {   
        $Knowledge = Knowledges_student::with('studiant')->where('id_student',$request->filter_student)->get();
        $respuesta=KnowledgesStudentResource::collection($Knowledge);
        return response()->json(['data' => $respuesta], 200);
    }
    
}
