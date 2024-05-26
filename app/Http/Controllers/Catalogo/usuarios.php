<?php

namespace App\Http\Controllers\Catalogo;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\LoginReuest;
use App\Models\Catusuario;
use App\Models\RelUsuarioFechas;

class usuarios extends Controller
{
    public function objeto_a_array($data){
        if (is_array($data) || is_object($data)){
            $result = array();
            foreach ($data as $key => $value){$result[$key] = $this->objeto_a_array($value);}
            return $result;
        }
        return $data;
    }
    public function postRegistro(Request $request){
        $jsonX = json_decode( $request['datos'] ,true);
        $json  = isset($jsonX['Usuario']) ? $jsonX['Usuario'] : [];
        $tCURP = (isset($json['tCURP'])&&$json['tCURP']!=""  ? "'".(trim($json['tCURP']))."'":   "NULL");
        $sqlact=Catusuario::all()->where('tCURP', $json['tCURP'])->first();
        if ($sqlact) {
            $ecodUsuario = (isset($sqlact->ecodUsuario) && $sqlact->ecodUsuario != "" ? "'" . (trim($sqlact->ecodUsuario)) . "'" : "");             
            $ecodUsuario2 = (isset($sqlact->ecodUsuario) && $sqlact->ecodUsuario != "" ? "" . (trim($sqlact->ecodUsuario)) . "" : "");             
            $tokenv = (isset($sqlact->tToken) && $sqlact->tToken != "" ? "'" . (trim($sqlact->tToken)) . "'" : "");             
            $ecodfechas="'01ae3cd3-144c-46a3-9aaa-bb9161b74737'";
            $esta= '"2660376e-dbf8-44c1-b69f-b2554e3e5d4c"';
            $selectrelUsuariofecha="SELECT ruf.*  FROM relusuariofecha ruf WHERE ruf.ecodUsuario =".$ecodUsuario." AND ruf.ecodfechas =".$ecodfechas." AND ruf.ecodEstatus = ".$esta;    
            $sqlreusuariofecha = DB::select($selectrelUsuariofecha); 
            if ($sqlreusuariofecha) {
                return response()->json([ 'token'=>(str_replace(['"', '\\'], '',$sqlact->tToken) ),'ecodUsuario'=>(str_replace(['"', '\\'], '',$sqlact->ecodUsuario))]);
            }
           else {
                $ecodfechas="01ae3cd3-144c-46a3-9aaa-bb9161b74737";
                $ecodEstatus = "2660376e-dbf8-44c1-b69f-b2554e3e5d4c";
                $loguuiduserfecha = Uuid::uuid4();
                $ecodrelusuariofecha = (isset($loguuiduserfecha)&&$loguuiduserfecha!="" ? "".(trim($loguuiduserfecha))."":   "NULL");
                $artrelusuariofecha = RelUsuarioFechas::create(['ecodrelusuariofecha' => $ecodrelusuariofecha,'ecodfechas' => $ecodfechas,'ecodUsuario' => $ecodUsuario2,'ecodEstatus' => $ecodEstatus]);
                return response()->json([ 'token'=>(str_replace(["'"], '',$sqlact->tToken)),'ecodUsuario'=>(str_replace(["'"], '',$sqlact->ecodUsuario)) ]);
            }
        }  
        else{
            $loguuid = Uuid::uuid4();
            $uuid2ecodUsuario = (isset($loguuid)&&$loguuid!="" ? '"'.(trim($loguuid)).'"':   "NULL");
            $uuid2ecodUsuario2 = (isset($loguuid)&&$loguuid!="" ? "".(trim($loguuid)). "":   "NULL");
            $tNombre1 = fake()->name();
            $tNombre = (isset($tNombre1)&&$tNombre1!="" ? ''.(trim($tNombre1)).'':   "NULL");
            $tPrimerApellido = fake()->lastname();
            $tSegundoApellido=fake()->lastname();
            $fhNacimiento=fake()->date();
            $nEdad = fake()->numberBetween(0, 100);   
            $ecodEstatus = "2660376e-dbf8-44c1-b69f-b2554e3e5d4c";
            $article = Catusuario::create(['tNombre' => $tNombre,'tCURP'=>$json['tCURP'],'ecodUsuario'=>$uuid2ecodUsuario2,'tPrimerApellido'=>$tPrimerApellido,'tSegundoApellido'=>$tSegundoApellido,'fhNacimiento'=>$fhNacimiento,'nEdad'=>$nEdad,'ecodEstatus'=>$ecodEstatus]);
            $user=User::all()->where('tCURP', $json['tCURP'])->first();
            $token=JWTAuth::fromUser($user);
            $tokenv = (isset($token) && $token != "" ? '"' . (trim($token)) . '"' : "");             
            $tokenv2 = (isset($token) && $token != "" ? "" . (trim($token)) . "" : "");             
            $article2 = Catusuario::where(['tCURP'=>$json['tCURP']])->update(['tToken'=>$tokenv2]);
            $ecodfechas="'01ae3cd3-144c-46a3-9aaa-bb9161b74737'";
            $loguuiduserfecha = Uuid::uuid4();
            $ecodrelusuariofecha = (isset($loguuiduserfecha)&&$loguuiduserfecha!="" ? "".(trim($loguuiduserfecha))."":   "NULL");
            $ecodfechas="01ae3cd3-144c-46a3-9aaa-bb9161b74737";
            $artrelusuariofecha = RelUsuarioFechas::create(['ecodrelusuariofecha' => $ecodrelusuariofecha,'ecodfechas' => $ecodfechas,'ecodUsuario' => $uuid2ecodUsuario2,'ecodEstatus' => $ecodEstatus]);
            return response()->json([ 'token'=>(str_replace(["'"], '',$tokenv2)),'ecodUsuario'=>(str_replace(["'"], '',$uuid2ecodUsuario2)) ]);
       }
    }

    public function getRegistro(Request $request){
        $jsonX = json_decode( $request['datos'] ,true);
        $json               = isset($jsonX['filtros']) ? $jsonX['filtros'] : [];
        $metodos            = isset($jsonX['metodos']) ? $jsonX['metodos'] : [];
        foreach ($json as $key => $value) {
            if(array_key_exists($key, $json) ){
				if ($value != ''){
					${$key} =$value ;
				}
			}
        }
         $selectEstructura="SELECT cf.Modulo,cf.Direccion, ruf.ecodrelusuariofecha,ruf.ecodUsuario, ce.tNombre AS estatus, cf.ecodfechas,cf.ecodMunicipio,cf.fhvacunacion,cfe.tNombre AS estatusfhVacunas, cm.tNombre AS Munucipio FROM relusuariofecha ruf
        LEFT JOIN catestatus ce ON ce.ecodEstatus = ruf.ecodEstatus
        LEFT JOIN catfechasvacunas cf ON cf.ecodfechas = ruf.ecodfechas
        LEFT JOIN catestatus cfe ON cfe.ecodEstatus = cf.ecodEstatus
        LEFT JOIN catmunicipios cm ON cm.ecodMunicipio=cf.ecodMunicipio 
        LEFT JOIN catusuario cu ON cu.ecodUsuario = ruf.ecodUsuario". " WHERE 1=1 ".  
        (isset($ecodUsuario)    ? " AND ruf.ecodUsuario  LIKE ('%".(str_replace(['"', '\\'], '',$ecodUsuario))."%')"        : '').
        (isset($tNombremunicipio) ? " AND cm.tNombre LIKE ('%".$tNombremunicipio."%')"       : '').
        (isset($estatus)        ? " AND ce.tNombre LIKE ('%".$estatus."%')"        : '').
        (isset($metodos['orden']) ? 'ORDER BY '.$metodos['tMetodoOrdenamiento']." ".$metodos['orden'] : 'ASC');
        $sql = DB::select($selectEstructura);

        $selectingUser="SELECT cu.tCURP, concat_ws('',cu.tNombre,' ', cu.tPrimerApellido,' ', cu.tSegundoApellido) as NombreUsuario FROM catusuario cu WHERE cu.ecodUsuario =".(str_replace([ '\\'], '',$ecodUsuario));
        $infuser = DB::select($selectingUser);

        return response()->json([ 'sql'=>(isset($sql) ? $sql : ""), 'sqinfuserl'=>(isset($infuser) ? $infuser : "")]);
    }
    
}
