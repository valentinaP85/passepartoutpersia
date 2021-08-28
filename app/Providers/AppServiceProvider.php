<?php

namespace App\Providers;

use App\Models\Size;
use App\Models\User;
use App\Models\Color;
use App\Models\Frame;
use App\Models\Glass;
use App\Models\Photo;
use App\Models\Rental;
use App\Models\Cardboard;
use App\Models\OtherRental;
use App\Models\RentalModel;
use App\Models\BookingRental;
use App\Models\CardboardForRental;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    

    public function boot()
    {
        if(Schema::hasTable('frames') && Schema::hasTable('users') && Schema::hasTable('cardboards') && Schema::hasTable('colors') && Schema::hasTable('sizes') && Schema::hasTable('cardboard_for_rentals') && Schema::hasTable('photos') && Schema::hasTable('glasses') && Schema::hasTable('rentals') && Schema::hasTable('rental_models') && Schema::hasTable('booking_rentals') && Schema::hasTable('other_rentals') ){
            $users = User::all();
            $users = User::orderBy('name', 'asc')->get();
            // $notices = Notice::all();
            // $notices = Notice::orderBy('title', 'asc')->get();
            // $information = Information::all();
            // $information = Information::orderBy('cell', 'asc')->get();
            $colors = Color::all();
            $colors = Color::orderBy('name', 'asc')->get();
            $sizes = Size::all();
            $sizes = Size::orderBy('name', 'asc')->get();
            $glasses = Glass::all();
            $glasses = Glass::orderBy('name', 'asc')->get();
            $frames = Frame::all();
            $frames = Frame::orderBy('profilo', 'asc')->get();
            $cardboards = Cardboard::all();
            $cardboards = Cardboard::orderBy('nome', 'asc')->get();
            $cardboard_for_rentals = CardboardForRental::all();
            $cardboard_for_rentals = CardboardForRental::orderBy('cardboard_id', 'asc')->get();
            $photos = Photo::all();
            $photos = Photo::orderBy('frame_id', 'asc')->get();
            $rental_models = RentalModel::all();
            $rental_models = RentalModel::orderBy('name', 'asc')->get();
            $rentals = Rental::all();
            $rentals = Rental::orderBy('size_id', 'asc')->get();
            $booking_rentals = BookingRental::all();
            $booking_rentals = BookingRental::orderBy('created_at', 'desc')->get();
            $other_rentals = OtherRental::all();
            $other_rentals = OtherRental::orderBy('created_at', 'desc')->get();
            
            
            View::share(compact('frames','users','cardboards','photos','sizes','colors','glasses', 'cardboard_for_rentals', 'rentals', 'rental_models', 'booking_rentals', 'other_rentals'));
        }
        
    }
}
