<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function ticket(){
        return $this->hasOne(Ticket::class); //or use "App\Ticket" class
    }
}
