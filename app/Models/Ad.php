<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'name','link','page'
    ];
    public static function daily()
    {
        return (New static)::where('page','Daily Ad')->get();
    }    
    public static function referral()
    {
        return (New static)::where('page','Referral Ad')->get();
    } 
    public static function video()
    {
        return (New static)::where('page','Video')->get();
    }
}
