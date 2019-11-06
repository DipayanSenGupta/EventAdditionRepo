<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function customMenu()
    {
       return $this->hasOne('App\CustomMenu');
    }}
