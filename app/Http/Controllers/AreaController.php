<?php

namespace App\Http\Controllers;

use App\Http\Resources\AreaResource;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    protected function index(Request $request){
        $area = Area::where('state', 1)->orderBy('name', 'ASC')->get();
        $data = AreaResource::collection($area);
        return \response()->json(['data' => $data], 200);
    }

    protected function store(Request $request){
        try{
            \DB::beginTransaction();
            $area = Area::create([
                'name' => strtoupper(trim($request->name)),
                'descripcion'=>strtoupper(trim($request->descripcion)),
                'state' => 1,
            ]);
            $data[] = $area;
            $resp = AreaResource::collection($data);
            \DB::commit();
            return \response()->json(['state' => 0, 'data' => $resp], 200);

        }catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function update(Request $request){
        try{
            $areaObj= Area::find($request->id);
            $areaObj->name = strtoupper(trim($request->name));
            $areaObj->state = strtoupper(trim($request->state));
            $areaObj->save();
            $data[] = $areaObj;
            $resp = AreaResource::collection($data);
            \DB::commit();
            return \response()->json(['state' => 0, 'data' => $resp], 200);


        }catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    protected function show($id)
    {
        $area = Area::select('id','name','descripcion','state')->find($id);;
        $data = AreaResource::collection(collect([$area]));
        return $data;
    }

    protected function destroy(Request $request){
        try {
            \DB::beginTransaction();
            $area = Area::where('id', $request->id)->delete();
            \DB::commit();
            return \response()->json(['state' => 0, 'id' => $request->id], 200);

        } catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }

    }



}
