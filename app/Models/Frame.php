<?php

namespace App\Models;

use App\Models\Photo;
use App\Models\RentalModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Frame extends Model
{
    use HasFactory;
    
    protected $fillable = ['profilo', 'essenze', 'descrizione','misuraFronte', 'profondita','status'];



    public function photos () {
        return $this->hasMany(Photo::class);
    }
  
    public function rental_models () {
        return $this->hasMany(RentalModel::class);
    }
}
