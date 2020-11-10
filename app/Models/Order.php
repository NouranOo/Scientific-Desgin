<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function shiping(){
        return $this->belongsTo('App\Models\Shiping','shiping_id');
    }
}
