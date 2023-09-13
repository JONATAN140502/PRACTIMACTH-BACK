<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\{
    PermissionResource
};

class LoginController extends Controller
{
    
    
    public function logincompany(Request $request)
{
    $hashedPassword = $request->password;

    try {
        $company = \App\Models\Company::where('user_name', $request->login)->first();

        if (!$company || !Hash::check($hashedPassword, $company->password)) {
            return response()->json([
                'company' => null,
                'state' => '1'
            ], 200);
        }

        return response()->json([
            'company' => $company,
            'state' => '0'
        ], 200);
    } catch (Exception $e) {
         return response()->json(['state' => '1', 'exception' => (string) $e]);
    }
}
public function loginstudent(Request $request)
{
    $hashedPassword = $request->password;

    try {
        $student = \App\Models\Student::where('user_name', $request->login)->first();

        if (!$student || !Hash::check($hashedPassword, $student->password)) {
            return response()->json([
                'student' => null,
                'state' => '1'
            ], 200);
        }

        return response()->json([
            'student' => $student,
            'state' => '0'
        ], 200);
    } catch (Exception $e) {
         return response()->json(['state' => '1', 'exception' => (string) $e]);
    }
}
public function loginadmin(Request $request)
{
    $hashedPassword = $request->password;

    try {
        $user = \App\Models\User::where('email', $request->login)->first();

        if (!$user|| !Hash::check($hashedPassword, $user->password)) {
            return response()->json([
                'user' => null,
                'state' => '1'
            ], 200);
        }

        return response()->json([
            'user' => $user,
            'state' => '0'
        ], 200);
    } catch (Exception $e) {
         return response()->json(['state' => '1', 'exception' => (string) $e]);
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
