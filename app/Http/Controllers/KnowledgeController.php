<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index(Request $request){
        $Knowledge = \App\Models\Knowledge::with('subspecialty.specialty.area')->orderBy('name', 'ASC')->get();
        $data = KnowledgeResource::collection($Knowledge);
        return \response()->json(['data' => $data], 200);
    }

    protected function filter(Request $request)
    {   
        $Knowledge = \App\Models\Knowledge::with('subspecialty')->where('id_subspecialty',$request->filter_subspecialty_id)->get();
        $data = KnowledgeResource::collection($Knowledge);
        return response()->json(['data' => $data], 200);
    }

    protected function store(Request $request){
        try{
            \DB::beginTransaction();
            $Knowledge = \App\Models\Knowledge::create([
                'name' => strtoupper(trim($request->name)),
                'descripcion'=>strtoupper(trim($request->descripcion)),
                'id_subspecialty'=>$request->id_subspecialty,
                'state' => 1,
            ]);
            $data[] = $Knowledge;
            $resp = KnowledgeResource::collection($data);
            \DB::commit();
            return \response()->json(['state' => 0, 'data' => $resp], 200);

        }catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function update(Request $request){
        try{
            $KnowledgeObj= \App\Models\Knowledge::find($request->id);
            $KnowledgeObj->name = strtoupper(trim($request->name));
            $KnowledgeObj->state = strtoupper(trim($request->state));
            $KnowledgeObj->id_subspecialty=$request->id_subspecialty;
            $KnowledgeObj->save();
            $data[] = $KnowledgeObj;
            $resp = KnowledgeResource::collection($data);
            \DB::commit();
            return \response()->json(['state' => 0, 'data' => $resp], 200);


        }catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function show($id)
    {
        $Knowledge = \App\Models\Knowledge::with('subspecialty')->find($id);
        $data = KnowledgeResource::collection(collect([$Knowledge]));
        return $data;
    }

    protected function destroy(Request $request){
        try {
            \DB::beginTransaction();
            $Knowledge = \App\Models\Knowledge::where('id', $request->id)->delete();
            \DB::commit();
            return \response()->json(['state' => 0, 'id' => $request->id], 200);

        } catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }

    }
}
