<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrameController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RentalController;
use App\Http\Middleware\RevisorMiddleware;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CardboardController;
use App\Http\Controllers\RentalModelController;
use App\Http\Controllers\CardboardForRentalController;

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



Route::middleware([RevisorMiddleware::class])->group(function(){
    Route::get('/users/revisorDashboard', [HomeController::class, 'revisorDashboard'])->name('users.revisorDashboard');
    Route::get('/richieste/noleggi', [RentalController::class, 'richiesteNoleggi'])->name('richieste.noleggi');
    Route::get('/richieste/{bookingRental}/noleggiShow', [RentalController::class, 'noleggiShow'])->name('richieste.noleggiShow');
    Route::post('/frames/store', [FrameController::class, 'store'])->name('frames.store');
    Route::get('/frames/create', [FrameController::class, 'create'])->name('frames.create');
    Route::post('/frames/{frame}/update', [FrameController::class, 'update'])->name('frames.update');
    Route::get('/frames/{frame}/edit', [FrameController::class, 'edit'])->name('frames.edit');
    Route::delete('/frames/{frame}/delete', [FrameController::class, 'destroy'])->name('frames.destroy');
    Route::get('/frames/{frame}/status', [FrameController::class, 'status'])->name('frames.status');

    Route::post('/photos/store', [PhotoController::class, 'store'])->name('photos.store');
    Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
    Route::post('/photos/{photo}/update', [PhotoController::class, 'update'])->name('photos.update');
    Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');

    Route::post('/cardboards/store', [CardboardController::class, 'store'])->name('cardboards.store');
    Route::get('/cardboards/create', [CardboardController::class, 'create'])->name('cardboards.create');
    Route::post('/cardboards/{cardboard}/update', [CardboardController::class, 'update'])->name('cardboards.update');
    Route::get('/cardboards/{cardboard}/edit', [CardboardController::class, 'edit'])->name('cardboards.edit');
    Route::delete('/cardboards/{cardboard}/delete', [CardboardController::class, 'destroy'])->name('cardboards.destroy');
    Route::get('/cardboards/{cardboard}/status', [CardboardController::class, 'status'])->name('cardboards.status');


    Route::post('/cardboardForRentals/store', [CardboardForRentalController::class, 'store'])->name('cardboardForRentals.store');
    Route::get('/cardboardForRentals/create', [CardboardForRentalController::class, 'create'])->name('cardboardForRentals.create');
    Route::post('/cardboardForRentals/{cardboardForRental}/update', [CardboardForRentalController::class, 'update'])->name('cardboardForRentals.update');
    Route::get('/cardboardForRentals/{cardboardForRental}/edit', [CardboardForRentalController::class, 'edit'])->name('cardboardForRentals.edit');
    Route::delete('/cardboardForRentals/{cardboardForRental}/delete', [CardboardForRentalController::class, 'destroy'])->name('cardboardForRentals.destroy');

    
    Route::post('/rentalModels/store', [RentalModelController::class, 'store'])->name('rentalModels.store');
    Route::get('/rentalModels/create', [RentalModelController::class, 'create'])->name('rentalModels.create');
    Route::post('/rentalModels/{rentalModel}/update', [RentalModelController::class, 'update'])->name('rentalModels.update');
    Route::get('/rentalModels/{rentalModel}/edit', [RentalModelController::class, 'edit'])->name('rentalModels.edit');
    Route::delete('/rentalModels/{rentalModel}/delete', [RentalModelController::class, 'destroy'])->name('rentalModels.destroy');
    Route::get('/rentalModels/{rentalModel}/status', [RentalModelController::class, 'status'])->name('rentalModels.status');


    Route::post('/rentals/store', [RentalController::class, 'store'])->name('rentals.store');
    Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create');
    Route::post('/rentals/{rental}/update', [RentalController::class, 'update'])->name('rentals.update');
    Route::get('/rentals/{rental}/edit', [RentalController::class, 'edit'])->name('rentals.edit');
    Route::delete('/rentals/{rental}/delete', [RentalController::class, 'destroy'])->name('rentals.destroy');
    Route::get('/rentals/{rental}/status', [RentalController::class, 'status'])->name('rentals.status');



    Route::get('/bookingRentals/{bookingRental}/edit', [RentalController::class, 'editP'])->name('bookingRentals.edit');

    // Route::post('/information/store', [InformationController::class, 'store'])->name('information.store');
    // Route::post('/information/{information}/update', [InformationController::class, 'update'])->name('information.update');
    // Route::get('/information/{information}/edit', [InformationController::class, 'edit'])->name('information.edit');

    // Route::post('/notices/store', [NoticeController::class, 'store'])->name('notices.store');
    // Route::post('/notices/{notice}/update', [NoticeController::class, 'update'])->name('notices.update');
    // Route::get('/notices/{notice}/edit', [NoticeController::class, 'edit'])->name('notices.edit');

});


Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/cap.json', [HomeController::class, 'json'])->name('cap.json');
Route::get('/condizioni-di-vendita', [HomeController::class, 'condizioni'])->name('condizioni-di-vendita');
Route::get('/contatti', [ContactController::class, 'index'])->name('contatti');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact/thankyou', [ContactController::class, 'thankyou'])->name('contact.thankyou');
Route::get('/cornici', [FrameController::class, 'index'])->name('cornici');
Route::get('/passepartout', [CardboardController::class, 'index'])->name('passepartout');
Route::get('/noleggio', [RentalController::class, 'index'])->name('noleggio');
Route::get('/prenotazione-noleggio', [RentalController::class, 'viewBooking'])->name('prenotazione-noleggio');
Route::post('/prenotazione-inviata', [RentalController::class, 'bookingRental'])->name('prenotazione-inviata');

Route::get('/azienda', [CompanyController::class, 'index'])->name('azienda');
Route::get('/ricerca-prodotti', [SearchController::class, 'index'])->name('ricerca-prodotti');
Route::get('/gallery', [PhotoController::class, 'index'])->name('gallery');