<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Frame;
use App\Models\RentalModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = ['frame_id', 'color_id', 'img'];

    public function frame () {
        return $this->belongsTo(Frame::class);
    }
    public function color () {
        return $this->belongsTo(Color::class);
    }
    public function rentalModel () {
        return $this->hasOne(RentalModel::class);
    }
}
