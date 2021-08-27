<?php

namespace App\Models;

use App\Models\Photo;
use App\Models\RentalModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class color extends Model
{
    use HasFactory;
   

    public function rental_Models () {
        return $this->hasMany(RentalModel::class);
    }
    public function photos () {
        return $this->hasMany(Photo::class);
    }


    
}
