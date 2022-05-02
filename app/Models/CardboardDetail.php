<?php

namespace App\Models;

use App\Models\Quote;
use App\Models\Cardboard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardboardDetail extends Model
{
    use HasFactory;
    protected $fillable = [ 'quote_id','cardboard_id','nCardboard','cardboardColor','misuraE','misuraI','fondo'];

    public function quote () {
        return $this->belongsTo(Quote::class , 'quote_id');
    }
    public function cardboard () {
        return $this->belongsTo(Cardboard::class,'cardboard_id');
    }
}
