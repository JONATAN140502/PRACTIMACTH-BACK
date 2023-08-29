<?php

namespace App\Http\Controllers;
use App\Http\Resources\PracticeResource;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index(Request $request){
        $Practice = \App\Models\Practice::with('company')->orderBy('name', 'ASC')->get();
        $data = PracticeResource::collection($Practice);
        return \response()->json(['data' => $data], 200);
    }

    protected function filter(Request $request)
    {
        $Practice = \App\Models\Practice::with('company')->get();
        $data = PracticeResource::collection($Practice);
        return response()->json(['data' => $data], 200);
    }
}
