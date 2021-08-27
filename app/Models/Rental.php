<?php

namespace App\Models;

use App\Models\Size;
use App\Models\RentalModel;
use App\Models\BookingRental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = ['rentalModel_id', 'size_id','rentalPrice', 'valueFrame', 'qta', 'status'];


    // rapporti con rentalModel e size

    public function rentalModel () {
        return $this->belongsTo(RentalModel::class , 'rentalModel_id');
    }
    public function size () {
        return $this->belongsTo(Size::class);
    }
    // public function giveMeName ($id) {
    //    $rentalModel = RentalModel::All()->where('id', $id)->first();
    //    return $rentalModel->name;
    // }
    public function bookingRental () {
        return $this->hasOne(BookingRental::class);
    }
   
    
}
