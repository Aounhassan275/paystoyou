<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Message;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function active($id)
    {
        $deposit = Deposit::find($id);
        $user = $deposit->user; 
        $package= Package::find($deposit->package_id);
        if($user->refer_by)
        {
            $refer_by = User::find($user->refer_by);
            $direct_income = $deposit->amount/100 * 10;
            $matching_income = $deposit->amount/100 * 5;
            if($user->refer_type == 'Left')
            { 
                if($refer_by->left_refferal == null)
                {
                    $refer_by->update([
                        'left_refferal' => $user->id,
                        'balance' => $refer_by->balance += $direct_income,
                        'r_earning' => $refer_by->r_earning += $direct_income,
                        'left_amount' => $matching_income,
                    ]);
                    Earning::create([
                        "user_id" => $refer_by->id,
                        "price" => $direct_income,
                        "type" => 'direct_income'
                    ]);
                    if($refer_by->left_refferal != null &&  $refer_by->right_refferal != null )
                    {
                        if($refer_by->left_amount > $refer_by->right_amount)
                        {
                            $refer_by->update([
                                'balance' => $refer_by->balance += $refer_by->right_amount,
                                'r_earning' => $refer_by->r_earning += $refer_by->right_amount,
                            ]);
                            Earning::create([
                                "user_id" => $refer_by->id,
                                "price" => $refer_by->right_amount,
                                "type" => 'matching_income'
                            ]);
                        }else{
                            $refer_by->update([
                                'balance' => $refer_by->balance += $refer_by->left_amount,
                                'r_earning' => $refer_by->r_earning += $refer_by->left_amount,
                            ]);
                            Earning::create([
                                "user_id" => $refer_by->id,
                                "price" => $refer_by->left_amount,
                                "type" => 'matching_income'
                            ]);
                        }
                    }
                }else{
                    $owner_left_refer = User::where('refer_by',$refer_by->id)->orWhere('main_owner',$refer_by->id)->where('refer_type','Left')->where('left_refferal',null)->first();
                    $refer_by->update([
                        'balance' => $refer_by->balance += $direct_income,
                        'r_earning' => $refer_by->r_earning += $direct_income,
                    ]);
                    $owner_left_refer->update([
                        'left_refferal' => $user->id,
                        'left_amount' => $matching_income,
                    ]);
                    Earning::create([
                        "user_id" => $refer_by->id,
                        "price" => $direct_income,
                        "type" => 'direct_income'
                    ]);
                    if($owner_left_refer->left_refferal != null &&  $owner_left_refer->right_refferal != null )
                    {
                        if($owner_left_refer->left_amount > $owner_left_refer->right_amount)
                        {
                            $owner_left_refer->update([
                                'balance' => $owner_left_refer->balance += $owner_left_refer->right_amount,
                                'r_earning' => $owner_left_refer->r_earning += $owner_left_refer->right_amount,
                            ]);
                            Earning::create([
                                "user_id" => $owner_left_refer->id,
                                "price" => $owner_left_refer->right_amount,
                                "type" => 'matching_income'
                            ]);
                        }else{
                            $owner_left_refer->update([
                                'balance' => $owner_left_refer->balance += $owner_left_refer->left_amount*2,
                                'r_earning' => $owner_left_refer->r_earning += $owner_left_refer->left_amount*2,
                            ]);
                            Earning::create([
                                "user_id" => $owner_left_refer->id,
                                "price" => $owner_left_refer->left_amount*2,
                                "type" => 'matching_income'
                            ]);
                        }
                    }
                }
            }else{
                if($refer_by->right_refferal == null)
                {
                    $refer_by->update([
                        'right_refferal' => $user->id,
                        'balance' => $refer_by->balance += $direct_income,
                        'r_earning' => $refer_by->r_earning += $direct_income,
                        'right_amount' => $matching_income,
                    ]);
                    Earning::create([
                        "user_id" => $refer_by->id,
                        "price" => $direct_income,
                        "type" => 'direct_income'
                    ]);
                    if($refer_by->left_refferal != null &&  $refer_by->right_refferal != null )
                    {
                        if($refer_by->left_amount > $refer_by->right_amount)
                        {
                            $refer_by->update([
                                'balance' => $refer_by->balance += $refer_by->right_amount*2,
                                'r_earning' => $refer_by->r_earning += $refer_by->right_amount*2,
                            ]);
                            Earning::create([
                                "user_id" => $refer_by->id,
                                "price" => $refer_by->right_amount*2,
                                "type" => 'matching_income'
                            ]);
                        }else{
                            $refer_by->update([
                                'balance' => $refer_by->balance += $refer_by->left_amount*2,
                                'r_earning' => $refer_by->r_earning += $refer_by->left_amount*2,
                            ]);
                            Earning::create([
                                "user_id" => $refer_by->id,
                                "price" => $refer_by->left_amount*2,
                                "type" => 'matching_income'
                            ]);
                        }
                    }
                }else{
                    $owner_right_refer = User::where('refer_by',$refer_by->id)->orWhere('main_owner',$refer_by->id)->where('right_refferal',null)->where('refer_type','Right')->first();
                    $refer_by->update([
                        'balance' => $refer_by->balance += $direct_income,
                        'r_earning' => $refer_by->r_earning += $direct_income,
                    ]);
                    $owner_right_refer->update([
                        'right_refferal' => $user->id,
                        'right_amount' => $matching_income,
                    ]);
                    Earning::create([
                        "user_id" => $refer_by->id,
                        "price" => $direct_income,
                        "type" => 'direct_income'
                    ]);
                    if($owner_right_refer->left_refferal != null &&  $owner_right_refer->right_refferal != null )
                    {
                        if($owner_right_refer->left_amount > $owner_right_refer->right_amount)
                        {
                            $owner_right_refer->update([
                                'balance' => $owner_right_refer->balance += $owner_right_refer->right_amount*2,
                                'r_earning' => $owner_right_refer->r_earning += $owner_right_refer->right_amount*2,
                            ]);
                            Earning::create([
                                "user_id" => $owner_right_refer->id,
                                "price" => $owner_right_refer->right_amount*2,
                                "type" => 'matching_income'
                            ]);
                        }else{
                            $owner_right_refer->update([
                                'balance' => $owner_right_refer->balance += $owner_right_refer->left_amount*2,
                                'r_earning' => $owner_right_refer->r_earning += $owner_right_refer->left_amount*2,
                            ]);
                            Earning::create([
                                "user_id" => $owner_right_refer->id,
                                "price" => $owner_right_refer->left_amount*2,
                                "type" => 'matching_income'
                            ]);
                        }
                    }
                }
            }
            $main_owner = User::find($user->main_owner);
            if($main_owner->main_owner_referral->count() > 0 && $user->refer_by != $main_owner->id)
            {
                $total_left = $main_owner->main_owner_referral->where('refer_type','Left')->count();
                $total_right = $main_owner->main_owner_referral->where('refer_type','Right')->count();
                if($total_left == $total_right)
                {
                    $last_left_refferal = $main_owner->main_owner_referral->where('refer_type','Left')->last();
                    if($last_left_refferal->left_amount > $last_left_refferal->right_amount)
                    {
                        $referral_left_amount = $last_left_refferal->right_amount; 
                    }else{
                        $referral_left_amount = $last_left_refferal->left_amount; 
                    }
                    $last_right_refferal = $main_owner->main_owner_referral->where('refer_type','Right')->last();
                    if($last_right_refferal->left_amount > $last_right_refferal->right_amount)
                    {
                        $referral_right_amount = $last_right_refferal->right_amount; 
                    }else{
                        $referral_right_amount = $last_right_refferal->left_amount; 
                    }
                    if($referral_right_amount > $referral_left_amount)
                    {
                        $total_amount = $referral_left_amount; 
                    }else{
                        $total_amount = $referral_right_amount; 
                    }
                    $main_owner->update([
                        'balance' => $main_owner->balance += $total_amount*2,
                        'r_earning' => $main_owner->r_earning += $total_amount*2,
                    ]);
                    Earning::create([
                        "user_id" => $main_owner->id,
                        "price" => $total_amount*2,
                        "type" => 'matching_income'
                    ]);
                }
            }
            if($main_owner->main_owner_left->where('refer_type','Left')->count() == $main_owner->main_owner_right->where('refer_type','Right')->count())
            {
                $last_left_ = $main_owner->main_owner_left->where('refer_type','Left')->last();
                $last_right= $main_owner->main_owner_right->where('refer_type','Right')->last();
                if($last_left_->left_amount > $last_right->right_amount)
                {
                    $total_amounts = $last_right->right_amount; 
                }else{
                    $total_amounts = $last_left_->left_amount; 
                }
                $main_owner->update([
                    'balance' => $main_owner->balance += $total_amounts*2,
                    'r_earning' => $main_owner->r_earning += $total_amounts*2,
                ]);
                Earning::create([
                    "user_id" => $main_owner->id,
                    "price" => $total_amounts*2,
                    "type" => 'matching_income'
                ]);
            }
        }
        // dd($deposit);
        $user->update([
            'status' => 'active',
            'a_date' => Carbon::today(),
            // 'balance' => $user->balance += $deposit->amount,
            'package_id' => $deposit->package_id
        ]);
        $deposit->update([
            'status' => 'old'
        ]);
        $employee = Admin::where('email','admin@pty.com')->first();
        $admin = Admin::where('email','admin1@mail.com')->first();
        $admin_amount = $deposit->amount/100 * 10; 
        $admin->update([
            'balance' => $admin->balance += $admin_amount
        ]);
        $employee->update([
            'balance' => $admin->balance += $admin_amount
        ]);
        // Message::send($user->phone,'Dear '.$user->fname.
        // ',
        // Your Deposit Request is Accepted Now. You are Active User of Our Site. Now, You can visit Our Site And Earn Money.
        // PAYS TO YOU');
        toastr()->success('User is Active Successfully');
        return redirect()->back();
    }
    public function delete($id){
        $deposit = Deposit::find($id);
        $user = $deposit->user; 
          $user->update([
            'status' => 'pending'
        ]);
        $deposit->delete();
        toastr()->success('Deposit Request is Deleted Successfully');
        return redirect()->back();
    }
}
