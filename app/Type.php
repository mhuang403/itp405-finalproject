<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $table = 'wine_types';

    public function wine()
    {
        return $this->hasMany('App\Wine');
    }
}
