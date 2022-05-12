<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function reviews()
    {
        //return review of a product which id is entered from review model class.
        return $this->hasMany('App\Review');
    }
}
