<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

use App\Http\Controllers\VentaController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/sql', function () {
    return view('sql.index');
});
Route::get('/categoria/create', function () {
    return view('categoria.create');
});

Route::post('/categoria/store',  [CategoriaController::class, 'store'])->name('categoria.store');


Route::get('/producto',  [ProductoController::class, 'index']);
Route::get('/producto/create',  [ProductoController::class, 'create']);
Route::post('/producto/store',  [ProductoController::class, 'store'])->name('producto.store');
Route::delete('/producto/delete/{id}',  [ProductoController::class, 'destroy'])->name('producto.delete');
Route::get('/producto/edit/{id}',  [ProductoController::class, 'edit'])->name('producto.edit');
Route::post('/producto/update/{id}',  [ProductoController::class, 'update'])->name('producto.update');

Route::get('/venta/create',  [VentaController::class, 'create']);
Route::post('/venta/store',  [VentaController::class, 'store'])->name('venta.store');