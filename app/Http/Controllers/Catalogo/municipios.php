<?php

namespace App\Http\Controllers\Catalogo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class municipios extends Controller
{

    public function objeto_a_array($data){
        if (is_array($data) || is_object($data)){
            $result = array();
            foreach ($data as $key => $value){$result[$key] = $this->objeto_a_array($value);}
            return $result;
        }
        return $data;
    }

    public function getcompremento(Request $request) {

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
        $selecatCatMunicipio="SELECT cm.ecodMunicipio , cm.tNombre FROM catmunicipios cm
        WHERE 1 = 1 ".
        (isset($ecodMunicipio)       ? " AND cm.ecodMunicipio LIKE ('%".$ecodMunicipio."%')"        : '').
        (isset($tNombre)        ? " AND cm.tNombre LIKE ('%".$tNombre."%')"        : '').
        (isset($metodos['eNumeroRegistros']) && (int)$metodos['eNumeroRegistros']>0 ? 'LIMIT '.$metodos['eNumeroRegistros'] : '');
        $sqlcatCatMunicipio = DB::select($selecatCatMunicipio);
        return response()->json(($sqlcatCatMunicipio));
    }
}
