<?php

namespace App\Models;

use App\Models\FrameDetail;
use App\Models\CardboardDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = ['name','surname', 'email', 'telefono', 'provincia', 'cap', 'message'];

    public function frameDetails () {
        return $this->hasMany(FrameDetail::class);
    }
    public function cardboardDetails () {
        return $this->hasMany(CardboardDetail::class);
    }
}
