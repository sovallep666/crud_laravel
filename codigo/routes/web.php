<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empleado/index',[EmpleadoController::class,'index']);
Route::get('/empleado/create',[EmpleadoController::class,'create']);
Route::get('/empleado/store',[EmpleadoController::class,'store']);

Route::delete('empleado/{id_empleado}', [EmpleadoController::class,'destroy'])->name('empleado.destroy');
Route::get('empleado/{id_empleado}/edit', [EmpleadoController::class,'edit'])->name('empleado.edit');
Route::patch('empleado/{id_empleado}', [EmpleadoController::class,'update'])->name('empleado.update');
Route::put('empleado/{id_empleado}', [EmpleadoController::class,'update'])->name('empleado.update');
