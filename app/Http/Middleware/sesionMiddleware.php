<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
/*use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;*/
use DB;

class sesionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        $selectpermisos = "SELECT * FROM catusuario cu WHERE cu.ecodUsuario = ".$request['headers']['ecodUsuario']." AND cu.tToken = ".$request['headers']['token'];
        $sqlecoddpermisos = DB::select(($selectpermisos)); 
        if($sqlecoddpermisos){
            $selectact="SELECT ce.tNombre as Estatus FROM catusuario cu 
            LEFT JOIN catestatus ce ON ce.ecodEstatus = cu.ecodEstatus
            WHERE cu.ecodUsuario=".$request['headers']['ecodUsuario'];
            $sqlact = DB::select(($selectact));          
            $Estatus   = (isset($sqlact[0]->Estatus) && $sqlact[0]->Estatus != "" ? "'" . (trim($sqlact[0]->Estatus)) . "'" : "");             
            if ($Estatus == "'Activo'") {
                return $next($request);
            }
            else {
                return response()->json(['mensaje'=>"Usuario invalido, Inicie sesion nuevamente",],401);
            }
        }
        else{
            return response()->json(['mensaje'=>"Token invalido, Inicie sesion nuevamente",],401);    
        }
    }
}
