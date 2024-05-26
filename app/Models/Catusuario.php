<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Catusuario extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "catusuario";
  
    protected $primaryKey='ecodUsuario';

    public $incrementing = false;
    
    protected $fillable = [
        'ecodUsuario',
        'tCURP',
        'tNombre',
        'tPrimerApellido',
        'tSegundoApellido',
        'fhNacimiento',
        'nEdad',
        'ecodEstatus',
        'tToken'
    ];
}
