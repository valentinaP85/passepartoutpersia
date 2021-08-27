<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Cardboard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardboardForRental extends Model
{
    use HasFactory;
    protected $fillable = ['pricePass', 'priceFondo', 'size_id', 'cardboard_id' ];
    
    public function size () {
        return $this->belongsTo(Size::class, 'size_id');
    }
    public function cardboard () {
        return $this->belongsTo(Cardboard::class,'cardboard_id');
    }
    
}
