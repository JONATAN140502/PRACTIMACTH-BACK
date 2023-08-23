<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\{
    UserResource
};
// use Uuid;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // public function __construct()
    // {        
    //     $this->middleware('auth');
    // }

    protected function index(Request $request){

        $user = \App\Models\User::get();             
        return UserResource::collection($user);  
    
    }

    public function store(Request $request){
          $hashPassword=$request->password;     
        $user = \App\Models\User::create([
            'name' => strtoupper(trim($request->name)),
            'email' => trim($request->email),
            'password' => bcrypt($hashPassword),
            'state' => trim(1),
        ]);
         
       
        $data[] = $user;
        return \response()->json(['state'=> 0,'data'=> $data],200);
 
    }

    protected function show($id){

        $user= \App\Models\User::select('id','name','email','password','state')->find($id);
        return \response()->json(['state'=>0,'data'=>$user]);
    }

    protected function update(Request $request) 
    {     $hashPassword=$request->password;  
        $user = \App\Models\User::find($request->id);
     
        $user->name = strtoupper(trim($request->name));
        $user->email = trim($request->email);
        $user->state = $request->state;
        $user->password=bcrypt($hashPassword);
        $user->save();
        $data[] = $user;
        return \response()->json(['state'=>0,'data'=>$data]);
    }

   

    protected function destroy(Request $request){

        $user = \App\Models\User::where('id',$request->id)->delete();
        return \response()->json($request->id,200);

    }

 
}
