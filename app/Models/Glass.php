<?php

namespace App\Models;


use App\Models\RentalModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Glass extends Model
{
    use HasFactory;
   

    public function rental_Models () {
        return $this->hasMany(RentalModel::class);
    }
}
