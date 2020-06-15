<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //
    function getPrice(){
        return number_format($this->price);
    }
}
