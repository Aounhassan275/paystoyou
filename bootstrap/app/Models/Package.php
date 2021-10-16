<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name','price','t_earning','ads','max','min', 'click','day','package_validity','discount','w_day'
    ];
}
