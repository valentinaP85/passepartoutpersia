<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Frame;
use App\Models\Glass;
use App\Models\Photo;
use App\Models\Rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentalModel extends Model
{
    use HasFactory;
    protected $fillable = ['name','color_id', 'status', 
    'frame_id', 'glass_id', 'photo_id'];

    public function frame () {
        return $this->belongsTo(Frame::class);
    }
    public function glass () {
        return $this->belongsTo(Glass::class);
    }
    public function color () {
        return $this->belongsTo(Color::class);
    }
    public function rentals () {
        return $this->hasMany(Rental::class);
    }
    public function photo () {
        return $this->belongsTo(Photo::class);
    }
  }
