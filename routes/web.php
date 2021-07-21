<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrameController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CardboardController;

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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contatti', [ContactController::class, 'index'])->name('contatti');
Route::get('/cornici', [FrameController::class, 'index'])->name('cornici');
Route::get('/passepartout', [CardboardController::class, 'index'])->name('passepartout');
Route::get('/noleggio', [RentalController::class, 'index'])->name('noleggio');
Route::get('/azienda', [CompanyController::class, 'index'])->name('azienda');
Route::get('/ricerca-prodotti', [SearchController::class, 'index'])->name('ricerca-prodotti');
