<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','fname','phone', 'email', 'password','city','status','left','right','left_refferal',
        'right_refferal','left_amount','right_amount','refer_type','balance','refer_by','ad_view','cnic',
        'address','r_earning','package_id', 'a_date','image', 'verification','main_owner','top_referral'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'a_date' => 'date',
    ];
    public function setPasswordAttribute($value){
        if (!empty($value)){
            $this->attributes['password'] = Hash::make($value);
        }
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/profile/');
    }
    public function refers()
    {
        return $this->hasMany('App\Models\User','refer_by')->where('status','active');
    }
    public function active_refer()
    {
        return User::where('refer_by',$this->id)->orWhere('main_owner',$this->id)->where('status','active')->get();
    }
    public function pending_refer()
    {
        return User::where('refer_by',$this->id)->orWhere('main_owner',$this->id)->where('status','pending')->get();
    }
    public function all_refer()
    {
        return User::where('refer_by',$this->id)->orWhere('main_owner',$this->id)->get();
    }
    public static function status(){
        return (new static)::where('status','active')->get();
    }
    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
    public static function active(){
        return (new static)::where('status','active')->get();
    } 
    public static function pending(){
        return (new static)::where('status','pending')->get();
    }
    
    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function c_deposits()
    {
        return $this->hasMany(C_deposit::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function todayViews()
    {
        return $this->hasMany(Play::class)->whereDate('created_at',Carbon::today())->count();
    }
    
    public function totalAds()
    {
        return $this->package->ads;
    }
    
    public function remainingViews()
    {
        return  $this->totalAds() - $this->todayViews();
    }
    
    public function todayEarning()
    {
        return $this->hasMany(Earning::class)->whereDate('created_at',Carbon::today())->sum('price');
    }
    
    public function totalEarning()
    {
        return $this->hasMany(Earning::class)->sum('price');
    }
    
    public function totalWithdraw()
    {
        return $this->hasMany(Withdraw::class)->sum('payment');
    }
    public function packageExpires()
    {
        return $this->a_date->addDays($this->package->package_validity);
    }
    public function referralEarning()
    {
        return $this->refers->count() * $this->package->r_earning;
    }
    public function todayreferralEarning()
    {
        return $this->refers()->count() * (($this->package->click/100)*($this->package->day)/$this->package->ads);
    }

    public function isEligible(){
        return $this->remainingViews()>0;
    }
    
    public function nextAd(){
        $ads = Ad::all();
        $array = $this->watchedAdsList();
        foreach($ads as $ad){
            if(!$this->foundInArray($array, $ad->id))
                return $ad;
        }
        return Ad::all()->first();
    }
    
    public function watchedAdsList(){
        return $this->hasMany(Play::class)->whereDate('created_at',Carbon::today())->get();
    }

    public function foundInArray($array,$value){
        $found = false;
        foreach ($array as $struct) {
            if ($value == $struct->ad_id) {
                $found = true;
                break;
            }
        }
        return $found;
    }

    public function checkStatus(){
        if(!$this->a_date){
            return 'fresh';

        } elseif (Carbon::now()->diffInDays($this->a_date) >= $this->package->package_validity){
            return 'expired';

        } else {
            return 'old';
        }
    }
	public function mrefers()
    {
        return $this->hasMany('App\Models\User','refer_by');
    }
	public function main_owner_referral()
    {
        return $this->hasMany('App\Models\User','main_owner')->where('right_refferal','!=',null)->where('left_refferal','!=',null);
    }
	public function main_owner_right()
    {
        return $this->hasMany('App\Models\User','main_owner')->where('right_refferal','!=',null);
    }
	public function main_owner_left()
    {
        return $this->hasMany('App\Models\User','main_owner')->where('left_refferal','!=',null);
    }
	public function refer_by_name($id)
    {
        $user = User::find($id);
        return $user->name;
    }
    public function transcations()
    {
        return $this->hasMany('App\Models\Transcation');
    }
    public function earnings()
    {
        return $this->hasMany(Earning::class,'user_id');
    }
}
