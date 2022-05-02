<?php

namespace App\Models;

use App\Models\BookingRental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingRentalDetail extends Model
{
    use HasFactory;
    protected $fillable = [ 'bookingRental_id','rental_id', 'vert', 'orizz', 'qta', 'passepartout', 'colorPass','fondo', 'montaggio', 'smontaggio'];
    
    public function bookingRental () {
        return $this->belongsTo(BookingRental::class , 'bookingRental_id');
    }
    public function rental () {
        return $this->belongsTo(Rental::class, 'rental_id');
    } 
}
