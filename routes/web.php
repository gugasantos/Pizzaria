<?php

use App\Http\Controllers\CardapioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashoboardController;
use App\Http\Controllers\PedidosController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect()->route('dashboard');
});


Route::resource('pedido',PedidosController::class);
Route::resource('cardapio',CardapioController::class);
Route::get('dashboard', [DashoboardController::class, 'index'])->name('dashboard');
Route::resource('clientes',ClienteController::class);



