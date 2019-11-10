<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventMenu extends Model
{
    public function items(){
        return $this->hasMany('App\EventMenuItem');
    }
}
