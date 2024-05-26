<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Catalogo\citas;

Route::post('relcitauser/eliminar', [citas::class,'deleteRegistro'])->middleware(['sesionactiva','eliminarcita']);

Auth::routes();