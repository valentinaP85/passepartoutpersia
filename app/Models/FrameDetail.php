<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Frame;
use App\Models\Glass;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FrameDetail extends Model
{
    use HasFactory;
    protected $fillable = ['quote_id','frame_id','nFrame','color_id','glass_id', 'frameSize','vertF' ,'orizzF'];
    
    public function quote () {
        return $this->belongsTo(Quote::class , 'quote_id');
    }

    public function frame () {
        return $this->belongsTo(Frame::class);
    }
    public function glass () {
        return $this->belongsTo(Glass::class);
    }
    public function color () {
        return $this->belongsTo(Color::class);
    }
}
