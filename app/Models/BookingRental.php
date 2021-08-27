<?php

namespace App\Models;

use App\Models\Rental;
use App\Models\RentalModel;

use App\Models\BookingRental;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingRental extends Model
{
    use HasFactory;
    protected $fillable = ['nameSurname', 'email', 'cap', 'rental_id', 'dal', 'al','trasporto','vert', 'orizz', 'qta', 'telefono', 'passepartout', 'colorPass','fondo', 'montaggio', 'smontaggio','message'];


    public function rental () {
        return $this->belongsTo(Rental::class);
    }
    public function rentalCode () {
        // $bookingRental= BookingRental::first();
 
        // if ($bookingRental->id > '99') {
        //    return date('y') . $bookingRental->id;
        // }elseif($bookingRental->id > '9'){
        //   return date('y') . '0' . $bookingRental->id;
        // }else{
        //    return date('y') . '00' .  $bookingRental->id;
        // }
        
    }
    
       
}
