<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Government extends Model
{
    protected $guarded=[];

    public function cities()
    {
        return $this->hasMany(City::class,'gov_id');
    }
}
