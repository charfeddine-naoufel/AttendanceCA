<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\PaymentprofController;
use App\Http\Controllers\PaymenteleveController;
use App\Http\Controllers\PaymentpackController;
use App\Http\Controllers\SeanceController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('/matieres', MatiereController::class);
    Route::resource('/niveaux', NiveauController::class);
    Route::resource('/groupes', GroupeController::class);
    Route::resource('/eleves', EleveController::class);
    Route::resource('/paiementsEleve', PaymenteleveController::class);
    Route::get('/recu-el/{id}', [PaymenteleveController::class,'downloadRecu'])->name('eleve.recu');
    Route::resource('/paiementsPack', PaymentpackController::class);
    Route::resource('/profs', ProfController::class);
    Route::resource('/paiementsProf', PaymentprofController::class);
    Route::get('/recu-pr/{id}', [PaymentprofController::class,'downloadRecu'])->name('prof.recu');
    Route::resource('/seances', SeanceController::class);
});
