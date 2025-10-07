<?php

use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('contacto'); // formulario
});

Route::post('/guardar', [MessageController::class, 'store'])->name('guardar');
Route::get('/registros', [MessageController::class, 'registros'])->name('registros');