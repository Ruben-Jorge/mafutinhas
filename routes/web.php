<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;

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

//route for test
Route::get('/cliente/novo',[ClienteController::class,'create'])->name('novoCliente');
Route::post('/cliente/salvar',[ClienteController::class,'store'])->name('salvarCliente');
Route::get('/clientes/listar',[ClienteController::class,'index'])->name('listarClientes');
Route::get('/cliente/{cliente}/editar',[ClienteController::class,'edit'])->name('editarCliente');
Route::post('/cliente/{cliente}/actualizar',[ClienteController::class,'update'])->name('actualizarCliente');
Route::get('/clientes/{cliente}/eliminar',[ClienteController::class,'destroy'])->name('eliminarCliente');