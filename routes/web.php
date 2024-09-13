<?php

use App\Http\Controllers\AreaController;
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

Route::view('/criar-conta', 'inscricao')->name('criar.atleta');

Route::post('/cadastrado', [HomeController::class, 'atletaCadastro'])->name('atleta.cadastrado');

/////////////////////////  Area Atleta   ///////////////////////////////////////////////

Route::get('/login', [AreaController::class, 'atletaLogin'])->name('a.login');

Route::post('/atleta-logar', [AreaController::class, 'atletaLogar'])->name('a.logar');

Route::get('/atleta-logout', [AreaController::class, 'atletaLogout'])->name('a.logout');

Route::middleware('auth:webatletas')->group(function () {

    Route::get('/area', [AreaController::class, 'atletaArea'])->name('atleta.area');

    Route::get('/confirmar-inscricao/{id}', [AreaController::class, 'confirmarInscricao'])->name('atleta.confirmar');

    Route::get('/confirmado/{id}', [AreaController::class, 'atletaConfirmado'])->name('atleta.confirmado');
});


/////////////////////////  Painel   ////////////////////////////////////////////////////

//Route::resource('/painel', PainelUserController::class);

Route::get('/painel-login', [PainelUserController::class, 'painelLogin'])->name('p-login');

Route::post('/painel-logar', [PainelTorneioController::class, 'painelLogar'])->name('p-logar');

Route::get('/painel-logout', [PainelTorneioController::class, 'painelLogout'])->name('p-logout');

Route::middleware('auth')->group(function () {
    Route::resources([
        '/painel-usuarios' => PainelUserController::class,
        '/painel-torneios' => PainelTorneioController::class
    ]);
    
    Route::get('/filtrar', [PainelUserController::class, 'filtrar'])->name('painel-filtrar');
    
    Route::get('/filtrar-campeonato', [PainelTorneioController::class, 'filtrarTorneio'])->name('painel-filtrarTorneio');
    
    Route::post('/salvar-destaques', [PainelTorneioController::class, 'salvarDestaques'])->name('painel-salvarDestaques');

});

