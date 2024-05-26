<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\RelUsuarioFechas;

use DB;

class EliminarCita
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) { 
        $jsonX = json_decode( $request['datos'] ,true);
        $resul=RelUsuarioFechas::where(['ecodrelusuariofecha'=>$jsonX['Folio']])->delete();
        return response()->json(['mensaje'=>"Cita eliminada",],200);
    }

}
