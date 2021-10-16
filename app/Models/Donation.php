<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'user_id','amount'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
