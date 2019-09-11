<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function person(){
        return $this->belongsTo('App\Person');
    }
}
