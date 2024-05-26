<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Catalogo\usuarios;
Route::post('catalogo/usuario/registrar', [usuarios::class,'postRegistro']);
Route::post('catalogo/usuario/vacunas/citas', [usuarios::class,'getRegistro'])->middleware(['sesionactiva']);

Auth::routes();