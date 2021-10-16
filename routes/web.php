<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\TreatmentsController;
use App\Http\Controllers\QuotesController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UsersController::class);

Route::resource('clients', ClientsController::class);
Route::get('clients/{id}/update', [ClientsController::class, 'update'])->name('clients.update');
Route::get('clients/{id}/destroy', [ClientsController::class, 'destroy'])->name('clients.destroy');

Route::resource('treatments', TreatmentsController::class);
Route::get('treatments/{id}/update', [TreatmentsController::class, 'update'])->name('treatments.update');
Route::get('treatments/{id}/destroy', [TreatmentsController::class, 'destroy'])->name('treatments.destroy');

Route::resource('quotes', QuotesController::class);
Route::get('quotes/{id}/update', [QuotesController::class, 'update'])->name('quotes.update');