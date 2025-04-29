<?php

use App\Http\Controllers\CalculosController;
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
    Route::delete('/{id}', [KeepinhoController::class, 'delete'])->name('keep.delete');

});
