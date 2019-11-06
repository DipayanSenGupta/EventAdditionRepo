<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomMenu extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event');
    }}
