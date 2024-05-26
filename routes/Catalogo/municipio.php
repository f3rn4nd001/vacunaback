<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Catalogo\municipios;
Route::post('catalogo/municipios/compremento', [municipios::class,'getcompremento']);

Auth::routes();