<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded=[];

    public function gov()
    {
        return $this->belongsTo(Government::class,'gov_id');
    }


}
