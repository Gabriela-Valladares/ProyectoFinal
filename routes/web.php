<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController; 
use App\Http\Controllers\CategoriasController; 
use App\Http\Controllers\EtiquetasController;

//INDEX
Route::get('/',[NotaController::class,'index'])->name('nota.index');

// SHOW
Route::get('/nota/{id}/show',[NotaController::class,'show'])->name('nota.show');

// CREATE Y STORE
Route::get('/nota/crear',[NotaController::class,'create'])->name('nota.crear');
Route::post('/nota/store',[NotaController::class,'store'])->name('nota.store');

// CREATE CATEGORIA
Route::post('/categoria/store',[CategoriasController::class,'store'])->name('categoria.store');

Route::post('/etiqueta/store',[EtiquetasController::class,'store'])->name('etiqueta.store');


// EDIT
Route::get('/nota/{id}/editar',[NotaController::class,'edit'])->whereNumber('id')->name('nota.editar');
Route::put('/nota/{id}/editar',[NotaController::class,'update'])->whereNumber('id')->name('nota.update');

//DELETE
Route::delete('/nota/{id}/borrar',[NotaController::class,'destroy'])->whereNumber('id')->name('nota.borrar');

