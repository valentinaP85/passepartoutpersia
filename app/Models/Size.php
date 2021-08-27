<?php

namespace App\Models;

use App\Models\Rental;
use App\Models\CardboardForRental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;
    
    public function rentals () {
        return $this->hasMany(Rental::class);
    }

    public function cardboardForRental () {
        return $this->hasOne(CardboardForRental::class);
    }
}
