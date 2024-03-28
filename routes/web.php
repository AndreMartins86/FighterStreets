<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PainelUserController;
use App\Http\Controllers\PainelTorneioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/detalhes/{campeonato}/{slug}', [HomeController::class, 'detalhes'])->name('detalhes');

Route::get('/torneios', [HomeController::class, 'torneios'])->name('torneios');

Route::get('/busca', [HomeController::class, 'busca'])->name('busca');

/////////////////////////  Painel   ///////////////////////////////////////////////

//Route::resource('/painel', PainelUserController::class);

Route::resources([
    '/painel-usuarios' => PainelUserController::class,
    '/painel-torneios' => PainelTorneioController::class
]);

Route::get('/filtrar', [PainelUserController::class, 'filtrar'])->name('filtrar');

Route::get('/filtrar-campeonato', [PainelTorneioController::class, 'filtrarTorneio'])->name('filtrarTorneio');