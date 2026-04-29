<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstabelecimentoController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\EmprestimoController;

Route::get('/', function () {
    return view('welcome');
});

Route::patch('/patrimonios/{patrimonio}/baixar', [PatrimonioController::class, 'baixar'])->name('patrimonios.baixar');
Route::resource('estabelecimentos', EstabelecimentoController::class);
Route::resource('patrimonios', PatrimonioController::class);
Route::resource('emprestimos', EmprestimoController::class);