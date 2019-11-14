<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function eventMenu()
    {
     return $this->hasOne(\App\EventMenu::class,'transaction_id');
    }
    
}
