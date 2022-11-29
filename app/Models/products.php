<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $table = 'products';

    //Relacion many to one (muchos a uno)
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
