<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculosController;
use App\Http\Controllers\ClientesRestauranteController;
use App\Http\Controllers\KeepinhoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/teste/{valor}', function ($valor) {
    return "Você digitou: {$valor}";
});
Route::get('/teste', function () {
    return view('teste');
});

// Route::get('/calc/somar/{x}/{y}', CalculosController::somar($x, $y));

Route::prefix('calc')->group(function () {
    Route::get('somar/{x}/{y}', [CalculosController::class, 'somar']);
    Route::get('subtrair/{x}/{y}', [CalculosController::class, 'subtrair']);
    Route::get('multiplicar/{x}/{y}', [CalculosController::class, 'multiplicar']);
    Route::get('dividir/{x}/{y}', [CalculosController::class, 'dividir']);
    Route::get('quadrado/{x}', [CalculosController::class, 'quadrado']);
});

Route::prefix('keep')->group(function () {
    Route::get('/', [KeepinhoController::class, 'index'])->name('keep.list');
    Route::post('/', [KeepinhoController::class, 'create'])->name('keep.create');
    Route::get('/form/{id?}', [KeepinhoController::class, 'form'])->name('keep.form');
    Route::put('/', [KeepinhoController::class, 'update'])->name('keep.update');    
    Route::delete('/{id}', [KeepinhoController::class, 'delete'])->name('keep.delete');
    Route::get('/trash', [KeepinhoController::class, 'trash'])->name('keep.trash');
    Route::get('/restore/{nota}', [KeepinhoController::class, 'restore'])->name('keep.restore');
});

Route::prefix('restaurante')->group(function () {
    Route::get('/', [ClientesRestauranteController::class, 'index'])->name('restaurante.list');
    Route::get('/form', [ClientesRestauranteController::class, 'create'])->name('restaurante.formCreate');
    Route::post('/', [ClientesRestauranteController::class, 'create'])->name('restaurante.create');
    Route::get('/form/{id}', [ClientesRestauranteController::class, 'update'])->name('restaurante.formUpdate');
    Route::put('/{id}', [ClientesRestauranteController::class, 'update'])->name('restaurante.update');
    Route::delete('/{id}', [ClientesRestauranteController::class, 'delete'])->name('restaurante.delete');
});


Route::prefix('autenticate')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('autenticate');
    Route::post('/create', [AuthController::class, 'create'])->name('autenticate.create');
    
    Route::get('/login', [AuthController::class, 'login'])->name('autenticate.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});