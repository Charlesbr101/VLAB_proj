<?php

use App\Http\Controllers\CategoriaTransacaoController;
use App\Http\Controllers\TransacaoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/transacoes/categorias', [CategoriaTransacaoController::class, 'index']);
Route::post('/transacoes/categorias', [CategoriaTransacaoController::class, 'store']);
Route::delete('/transacoes/categorias/{categoria_transacao}', [CategoriaTransacaoController::class, 'destroy']);

Route::get('/transacoes', [TransacaoController::class, 'index']);
Route::post('/transacoes', [TransacaoController::class, 'store']);
Route::get('/transacoes/filtrar', [TransacaoController::class, 'indexFiltered']);
Route::delete('/transacoes/{transacao}', [TransacaoController::class, 'destroy']);

Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy']);