<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function pessoas()
    {
        return $this->belongsTo('App\Pessoa');
    }
}
