<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Wine extends Model
{
    protected $table = 'wine_list';

    protected $primaryKey = 'wine_id';

    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo('App\Type', 'wine_type_id', 'wine_type_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id', 'country_id');
    }

    public function grape()
    {
        return $this->belongsTo('App\Grape', 'grape_id', 'grape_id');
    }
}
