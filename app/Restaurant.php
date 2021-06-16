<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'desciption',
        'user_id',
        'slug',
        'open_hour',
        'close_hour',
        'restaurant_address',
        'photo',
      ];   
      
    public function user(){
        return $this->hasMany('App\User');
    }
}
