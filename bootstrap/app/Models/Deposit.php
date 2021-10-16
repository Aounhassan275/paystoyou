<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        't_id','payment','user_id','package_id','amount','status'
    ];
    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public static function user_id()
    {
        return (New static)::where('user_id',' ')->get();
    }
    public static function new()
    {
        return (New static)::where('status','new')->get();
    }
    public static function old()
    {
        return (New static)::where('status','old')->get();
    }
}
