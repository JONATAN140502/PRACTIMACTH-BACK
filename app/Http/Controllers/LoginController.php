<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\{
    PermissionResource
};

class LoginController extends Controller
{
    
    
    public function logincomapny(Request $request)
    {
        try{  
     $company =\App\Models\Company::where('user_name', $request->user_name)
        ->where('password', hash('sha256', $request->password))
        ->first();

         return \response()->json([
             'company'=> $comapny,
             'state'=> 0
         ],200);
        }catch (Exception $e) {
            \DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    public function salircomapny(Request $request)
    {
        /** cerrar sesio de vigilancia */
        $session = \App\Models\SurveillanceSession::where('user_id',Auth::user()->id)->first();
        if($session){
            $session->end = date('Y-m-d H:i:s');
            $session->state=0;
            $session->save();
        }
        Auth::user()->token()->revoke();
        return \response()->json(['state'=>200,'user'=> Auth::user()],200);
    }
}
