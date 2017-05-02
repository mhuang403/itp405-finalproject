<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grape extends Model
{
    public function wine()
    {
        return $this->hasMany('App\Wine');
    }
}
