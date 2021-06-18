<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    public function restaurants()
    {
      return $this->belongsToMany('App\Restaurant');
    }
}
