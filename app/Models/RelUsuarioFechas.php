<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class RelUsuarioFechas extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "relusuariofecha";
  
    protected $primaryKey='ecodrelusuariofecha';

    public $incrementing = false;
    
    protected $fillable = [
        'ecodrelusuariofecha',
        'ecodfechas',
        'ecodUsuario',
        'ecodEstatus',
        
    ];
}
