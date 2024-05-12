<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Models\Client;

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
    return view('sendDemande');
})->name('home');
Route::post('/send-post', [ClientController::class, 'sendDemande'])->name('send');
Route::get('/list-clients', [ClientController::class, 'indexClient'])->name('listClient')->middleware('isAuth');
Route::get('/add-post/{id}', [ClientController::class, 'postBlade'])->name('p.blade')->middleware('isAuth');
Route::post('/addP/{id}', [ClientController::class, 'postStore'])->name('p.store')->middleware('isAuth');
Route::get('/sign-up', [ClientController::class, 'signupBlade'])->name('signup.blade');
Route::post('/sign-up-post', [ClientController::class, 'signup'])->name('signUp');
Route::get('/log-in', [ClientController::class, 'loginBlade'])->name('login.blade');
Route::post('/log-in-post', [ClientController::class, 'login'])->name('login');
Route::post('/logout', [ClientController::class, 'logout'])->name('logout');
Route::get('/add-cable/{id}', [ClientController::class, 'cableBlade'])->name('c.blade')->middleware('isAuth');
Route::post('/addC/{id}', [ClientController::class, 'cableStore'])->name('c.store')->middleware('isAuth');
Route::get('/demande-pdf/{id}', [ClientController::class, 'demandePdf'])->name('demandePdf')->middleware('isAuth');
Route::post("client-destroy/{id}", [ClientController::class, 'delete'])->name('client.delete');
Route::get('/{any}', function () {
    return 'Not found';
})->where('any', '.*');