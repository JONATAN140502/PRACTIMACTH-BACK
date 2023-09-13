<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Company,Areas_company,area};
use App\Http\Resources\{CompanyResource, AreasCompanyResource,AreaResource};
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Uuid;

class CompanyController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    protected function index(Request $request)
    {
        $companies = Company::orderBy('name', 'ASC')->get();
        $data = CompanyResource::collection($companies);
        return response()->json(['data' => $data], 200);
    }
    protected function filterAreas(Request $request)
    {
        $data_areas_of_company = Areas_company::where('id_company',$request->id)->get();
        //$areas=AreasCompanyResource::collection($data_areas_of_company);
        foreach ($data_areas_of_company as $key) {
            //$area=Area::select('name')->find($key['id_area']);
            $resp = \App\Models\Area::where('id',$key['id_area'])->with('specialty.subspecialty.knowledge')->get();
            //$data = AreaResource::collection($resp);
            $areas[]=$resp[0];

        }
        //$areas = \App\Models\Area::where('id',1)->with('specialty.subspecialty')->get();
        return response()->json(['data' => $areas], 200);
    }

    protected function store(Request $request)
    {    $hashedPassword = $request->password;
        try {
            DB::beginTransaction();
            $company = Company::create([
            'name' => strtoupper(trim($request->name)),
            'ruc' => $request->ruc,
            'correo' => $request->correo,
            'business_name' => $request->business_name,
            'address' => $request->address,
            'district' => $request->district,
            'province' => $request->province,
            'department' => $request->department,
            'phone' => $request->phone,
            'descripcion' => $request->descripcion,
            'valoration' => $request->valoration,
            'user_name' => $request->user_name,
            'password' =>bcrypt($hashedPassword),
            'state' =>1
            ]);
            $data[] = $company;
            $resp = CompanyResource::collection($data);
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
        $companyObj = Company::find($request->id);
        $companyObj->name = strtoupper(trim($request->name));
        $companyObj->ruc = strtoupper(trim($request->ruc));
        $companyObj->correo = strtoupper(trim($request->correo));
        $companyObj->business_name = strtoupper(trim($request->business_name));
        $companyObj->address = strtoupper(trim($request->address));
        $companyObj->district = strtoupper(trim($request->district));
        $companyObj->province = strtoupper(trim($request->province));
        $companyObj->department = strtoupper(trim($request->department));
        $companyObj->phone = strtoupper(trim($request->phone));
        $companyObj->descripcion = strtoupper(trim($request->descripcion));
        $companyObj->valoration = trim($request->valoration);
        $companyObj->user_name = trim($request->user_name);
        $hashedPassword = $request->password;
        $companyObj->password = bcrypt($hashedPassword);
        $companyObj->state = trim($request->state);
        $companyObj->save();

        $data[] = $companyObj;
        $resp = CompanyResource::collection($data);

        DB::commit();
        return response()->json(['state' => 0, 'data' => $resp], 200);

    } catch (Exception $e) {
        DB::rollback();
        return ['state' => '1', 'exception' => (string) $e];
    }
}
    

    protected function show($id)
    {
        $company = Company::select( 
        'name' ,
        'ruc' ,
        'correo' ,
        'business_name' ,
        'address'  ,
        'district' ,
        'province' ,
        'department' ,
        'phone' ,
        'descripcion',
        'valoration',
        'password'
        )->find($id);
        $data_areas_of_company = Areas_company::where('id_company',$id)->get();
        $areas=[];
        foreach ($data_areas_of_company as $key) {
            $area=Area::select('name')->find($key['id_area']);
            $areas[]=$area['name'];

        }

        return response()->json(['state' => 0, 'company' => $company,'areas'=>$areas], 200);
    }

    protected function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            //buscar dentro de la tabla las areas relacionadas a la compañia
            $data_areas_of_company = \App\Models\Areas_company::where('id_company',$request->filter_company_id)->get();
            foreach ($data_areas_of_company as $relacion) {
                Areas_company::where('id', $relacion->id)->delete(); //borrar el area relacionada
                DB::commit();
            }
            //borrar compañia
            Company::where('id', $request->id)->delete();
            DB::commit();
            return response()->json(['state' => 0, 'id' => $request->id], 200);

        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }

    //  Insetar en la tabla relacional area_company
    protected function storearea(Request $request)
    {  
        try {
            DB::beginTransaction();

            $area_company=Areas_company::create([ 
              'state'=>1,
              'id_company'=> $request->id_company,
              'id_area'=> $request->id_area,
            ]);
            DB::commit();
            return response()->json(['state' => 0, 'data' =>$area_company], 200);
        } catch (Exception $e) {
            DB::rollback();
            return ['state' => '1', 'exception' => (string) $e];
        }
    }
    
}
