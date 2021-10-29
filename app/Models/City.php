<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function state(){
       return $this->belongsTo(State::class);
    }
    protected $fillable=[
        'name','state_id','country_id'
    ];
    public function getNameAttribute($value){
        return ucfirst($value);
    }
}
