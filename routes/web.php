<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\LanguageController;
use App\Models\KeysPlaces;
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

Route::middleware('guest')->group(function () {

    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::post('/storeUser', [GeneralController::class, 'storeUser'])->name('storeUser');

    // Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginView'])->name('loginView');
    // Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
});


// Route::group(['middleware' => ['web', 'auth:club']], function () {

//     //Dashboard
//     Route::get('/home', [DashboardController::class, 'index'])->name('home');
//     Route::post('/getAnswers', [DashboardController::class, 'getAnswers'])->name('getAnswers');

//     Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// });
