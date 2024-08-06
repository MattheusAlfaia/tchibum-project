<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\MomentController;
use App\Http\Controllers\ContatusController;
use App\Http\Controllers\PacksController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\GeocodeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\PacksCustomControllers;
use App\Http\Controllers\Shopping;
use App\Http\Controllers\PaymentController;



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

//instutucional

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sobre', [AboutController::class, 'index']);

Route::get('/depoimentos', [TestimonyController::class, 'index']);

Route::get('/faleconosco', [ContatusController::class, 'index']);

Route::post('/faleconosco/mensagem', [ContatusController::class, 'mensagem']);

//comunidade

Route::get('/comunidades', [CommunityController::class, 'index']);

Route::get('/comunidade-{comunidade}', [CommunityController::class, 'community']);

//atividades

Route::get('/atividades', [ActivitiesController::class, 'index']);

Route::get('/atividade-{opcoe}', [ActivitiesController::class, 'activity']);

//posts

Route::get('/posts', [PostsController::class, 'index']);

Route::get('/post-{datepost}', [PostsController::class, 'post']);

Route::get('/geocode/{address}', [GeocodeController::class, 'geocode']);


//idiomas

Route::middleware('web')->group(function () {
    Route::get('/change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change.language');
});


//PACOTES

 // Pacotes Fechados

Route::get('/pacotes', [PacksController::class, 'index']);
Route::get('/pacote-{pacote}', [PacksController::class, 'pack']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

     // Pacotes Fechados

    Route::post('/adddadoscomple/{user}', [PacksController::class, 'addDadosComple'])->name('adddadoscomple');
    Route::post('/solicitacaocompra/{pacote}', [PacksController::class, 'solicitacaoCompra']);
    Route::get('/pacote/enviarsolicitacao/{pacote}', [PacksController::class, 'enviarSolicitacao']);


    // Pacotes Personalizados

    Route::get('/pacotes_personalizados', [PacksCustomControllers::class, 'index']);

    Route::post('/pacoteperso/criarpacotepersonalizado', [PacksCustomControllers::class, 'createPacotePerso']);
    Route::get('/pacoteperso/enviarsolicitacao/{pacotepersonalizado}', [PacksCustomControllers::class, 'enviarSolicitacao']);

    Route::middleware(['admin'])->group(function(){
        Route::get('/pacoteperso/aprovarsolicitacao/{pacotepersonalizado}', [PacksCustomControllers::class, 'AprovarSolicitacao']);
        Route::get('/pacoteperso/reprovarsolicitacao/{pacotepersonalizado}', [PacksCustomControllers::class, 'ReprovarSolicitacao']);
    });

    // payment
     
    Route::get('/payment', [PaymentController::class, 'index']);

    // Calendar

    Route::post('/pacoteperso/verificardata', [PacksCustomControllers::class, 'verificarData']);
    Route::post('/pacoteperso/verificardias', [PacksCustomControllers::class, 'verificarDias']);
    Route::get('/pacoteperso/viewcalendar', [PacksCustomControllers::class, 'viewCalendar']);

    // Shopping
   
    Route::get('/compras-{id}', [Shopping::class, 'index']);

});

