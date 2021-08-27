<?php

namespace App\Models;

use App\Models\CardboardForRental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cardboard extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'caratteristiche', 'colori', 'spessore', 'misuraFoglio', 'superficie','status'];
    
    public function cardboardForRentals () {
        return $this->hasMany(CardboardForRental::class);
    }
}
