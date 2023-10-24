<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\AccountController;

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

Route::get('/devis-proprio', function () {
    return view('/devis/devis-proprio');
});

Route::get('/devis-client', function () {
    return view('/devis/devis-client');
});

Route::prefix('/logement')->group(function() {

    Route::get('/{id}/details', function(Request $req, $id) {
        return view('details_logement', ['id_logement' => $id]);
    })->where('id', '[0-9]+');
});

Route::prefix('/account')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('client/profil', AccountController::class)->name('myClientAccount')->middleware(['auth', 'isClient']);
    Route::get('proprietaire/profil', [AccountController::class, 'loginProprietaire'])->name('myProprietaireAccount')->middleware(['auth', 'isProprietaire']);
    Route::get('admin/profil', AccountController::class)->name('myAdminAccount')->middleware(['auth', 'isAdmin']);
    Route::get('updateAccount', [AccountController::class, 'updateAccount'])->name('updateAccount')->middleware('auth');
});

