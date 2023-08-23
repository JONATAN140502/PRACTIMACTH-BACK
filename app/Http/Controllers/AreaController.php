<?php

namespace App\Http\Controllers;

use App\Http\Resources\AreaResource;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function show($id)
    {
        $area = \App\Models\Area::select('id','name','address','phone','state')->find($id);;
        $data = AreaResource::collection(collect([$area]));
        return $data;
    }
}
