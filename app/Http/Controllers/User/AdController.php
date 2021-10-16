<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\User;
use App\Models\Earning;
use App\Models\Play;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function show()
    {
      $user = Auth::user();   
      if($user->isEligible()){
        $ad = $user->nextAd();
        return view('user.ad.show')->with('ad', $ad);
      } 
      else {
        return redirect(route('user.dashboard.index'));
      }
    }
    public function ad_verify($id)
    {
      $package=Auth::user()->package;
       $user = Auth::user();
       if(!$user->isEligible()){
          toastr()->success('You reached Dashboard Successfully,Dont try to cheat us');
         return redirect(route('user.dashboard.index'));
       }

      $user1 = User::find($user->refer_by);

      if($user1){
          $user1->r_earning += (($user1->package->click/100)*($package->day/$package->ads));
          $user1->balance += (($user1->package->click/100)*($package->day/$package->ads));
          $user1->save();
      }

      $ad= Ad::find($id);
      $user = Auth::user();
      $earning =Earning::create([
        "user_id" => $user->id,
        "price" => $package->day/$package->ads
      ]);
      $play = Play::create([
        "user_id" => $user->id,
        "ad_id" => $ad->id
      ]);
      $user->balance+=($package->day/$package->ads);
      $user->save();
      return redirect(route('user.dashboard.index')); 
    }
}
