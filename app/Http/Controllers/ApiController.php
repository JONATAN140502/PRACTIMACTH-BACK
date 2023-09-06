<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    protected function dni(Request $request){
        try{
            $app_ley="pachasc@22";
                    $token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im1ycDExMDc5M0BnbWFpbC5jb20ifQ.QvHfD1vV7aEB50mV7P_VdmyHvPO_Qrga34thSdQ-WIs";
                    $host="http://www.consultasapi.devmiguelrevilla.com/api/test/".$request->documento.'/'.$token;
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $host,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_TIMEOUT => 30000,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                            // Set Here Your Requesred Headers
                            'Content-Type: application/json',
                            'x-api-key: '.$app_ley
                        ),
                    ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
    
            if ($err) {
                return \response()->json(['state' => 1, 'exception' => $err], 200);
            } else {
                $data = json_decode($response, true); 

    
                return \response()->json(['state' => 0, 'data' => $data], 200);
            }
        } catch (Exception $err) {
            return ['state' => '1', 'exception' => (string) $err];
        }
    }
    
    protected function ruc(Request $request){
        try{
            $url = 'https://api.apis.net.pe/v1/ruc?numero=' . $request->documento;
            $token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $token
                ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
    
            if ($err) {
                return \response()->json(['state' => 1, 'exception' => $err], 200);
            } else {
                $data = json_decode($response, true); // Decodificar la respuesta JSON
    
                // Extraer los valores necesarios
                $ruc = $data['numeroDocumento'];
                $estado = $data['estado'];
                $direccion = $data['direccion'];
                $ubigeo = $data['ubigeo'];
                $distrito = $data['distrito'];
                $provincia = $data['provincia'];
                $departamento = $data['departamento'];
                $nombre = $data['nombre'];
    
                // Crear la cadena de datos en el formato deseado
                $formattedData = [
                    'ruc' => $ruc,
                    'estado' => $estado,
                    'direccion' => $direccion,
                    'ubigeo' => $ubigeo,
                    'distrito' => $distrito,
                    'provincia' => $provincia,
                    'departamento' => $departamento,
                    'nombre' => $nombre,
                ];
    
                return \response()->json(['state' => 0, 'data' => $formattedData], 200);
            }
        } catch (Exception $err) {
            return ['state' => '1', 'exception' => (string) $err];
        }
    }
    

}
