<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function wine()
    {
        return $this->hasMany('App\Wine');
    }
}
