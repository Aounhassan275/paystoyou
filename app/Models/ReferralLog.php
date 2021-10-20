<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferralLog extends Model
{
    protected $fillable = [
        'countLeft','countRight','type','leftUser','rightUser','amount','main_owner'
    ];
}
