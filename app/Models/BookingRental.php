<?php

namespace App\Models;

use App\Models\Rental;
use App\Models\RentalModel;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingRental extends Model
{
    use HasFactory;
    protected $fillable = ['name','surname', 'email', 'telefono', 'provincia', 'cap',  'dal', 'al','trasporto', 'message'];


    // public function rental () {
    //     return $this->belongsTo(Rental::class);
    // }
    public function BookingRentalDetails () {
        return $this->hasMany(BookingRentalDetail::class);
    }

    public function formatRentalCode () { 
        if($this->id > '99'){
            return date('y') . $this->id;
        } else if ($this->id > '9'){
            return date('y') . '0' . $this->id;
        } else {
            return date('y') . '00' . $this->id;
        }   
    }

    public function formatPreventivoN () { 
        if($this->id > '99'){
            return $this->id;
        } else if ($this->id > '9'){
            return '0' . $this->id;
        } else {
            return '00' . $this->id;
        }   
    }
    
       
}
