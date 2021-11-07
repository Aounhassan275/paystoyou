<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Message;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Package;
use App\Models\ReferralLog;
use App\Models\User;
use App\Models\CompanyAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function active($id)
    {
        $deposit = Deposit::find($id);
        $user = $deposit->user; 
        $package = Package::find($deposit->package_id);
        $company_account= CompanyAccount::find(1);
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
                    $user->update([
                        'top_referral' => 'Done',
                    ]);
                    Earning::create([
                        "user_id" => $refer_by->id,
                        "price" => $direct_income,
                        "type" => 'direct_income'
                    ]);
                    $company_account->update([
                        'balance' => $company_account->balance -= $direct_income,
                    ]);
                    $chain = $refer_by;
                    for($i = 0;$i < 1000;$i++)
                    {
                        $referrral_chain = User::where('left_refferal',$chain->id)->orWhere('right_refferal',$chain->id)->first();
                        if($referrral_chain->left_refferal == $chain->id)
                        {
                            $referrral_chain->update([
                                'left_amount' =>   $referrral_chain->left_amount + $matching_income,
                            ]);
                        }else{
                            $referrral_chain->update([
                                'right_amount' =>   $referrral_chain->right_amount + $matching_income,
                            ]);
                        }
                        $chain = $referrral_chain;
                        if($referrral_chain->id == $user->main_owner)
                        {
                            $i = 1000;
                        }
                    }
                    // if($refer_by->left_refferal != null &&  $refer_by->right_refferal != null )
                    // {
                    //     if($refer_by->left_amount > $refer_by->right_amount)
                    //     {
                    //         $refer_by->update([
                    //             'balance' => $refer_by->balance += $refer_by->right_amount*2,
                    //             'r_earning' => $refer_by->r_earning += $refer_by->right_amount*2,
                    //         ]);
                    //         $company_account->update([
                    //             'balance' => $company_account->balance -= $refer_by->right_amount*2,
                    //         ]);
                    //         Earning::create([
                    //             "user_id" => $refer_by->id,
                    //             "price" => $refer_by->right_amount*2,
                    //             "type" => 'matching_income'
                    //         ]);
                    //     }else{
                    //         $refer_by->update([
                    //             'balance' => $refer_by->balance += $refer_by->left_amount*2,
                    //             'r_earning' => $refer_by->r_earning += $refer_by->left_amount*2,
                    //         ]);
                    //         Earning::create([
                    //             "user_id" => $refer_by->id,
                    //             "price" => $refer_by->left_amount*2,
                    //             "type" => 'matching_income'
                    //         ]);
                    //         $company_account->update([
                    //             'balance' => $company_account->balance -= $refer_by->left_amount*2,
                    //         ]);
                    //     }
                    // }
                }else{
                    $user->update([
                        'top_referral' => 'Pending',
                    ]);
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
                    $user->update([
                        'top_referral' => 'Done',
                    ]);
                    Earning::create([
                        "user_id" => $refer_by->id,
                        "price" => $direct_income,
                        "type" => 'direct_income'
                    ]);
                    $company_account->update([
                        'balance' => $company_account->balance -= $direct_income,
                    ]);
                    $chain = $refer_by;
                    for($i = 0;$i < 1000;$i++)
                    {
                        $referrral_chain = User::where('left_refferal',$chain->id)->orWhere('right_refferal',$chain->id)->first();
                        if($referrral_chain->left_refferal == $chain->id)
                        {
                            $referrral_chain->update([
                                'left_amount' =>   $referrral_chain->left_amount + $matching_income,
                            ]);
                        }else{
                            $referrral_chain->update([
                                'right_amount' =>   $referrral_chain->right_amount + $matching_income,
                            ]);
                        }
                        if($referrral_chain->id == $user->main_owner)
                        {
                            $i = 1000;
                        }
                        $chain = $referrral_chain;
                    }
                    // if($refer_by->left_refferal != null &&  $refer_by->right_refferal != null )
                    // {
                    //     if($refer_by->left_amount > $refer_by->right_amount)
                    //     {
                    //         $refer_by->update([
                    //             'balance' => $refer_by->balance += $refer_by->right_amount*2,
                    //             'r_earning' => $refer_by->r_earning += $refer_by->right_amount*2,
                    //         ]);
                    //         Earning::create([
                    //             "user_id" => $refer_by->id,
                    //             "price" => $refer_by->right_amount*2,
                    //             "type" => 'matching_income'
                    //         ]);
                    //         $company_account->update([
                    //             'balance' => $company_account->balance -= $refer_by->right_amount*2,
                    //         ]);
                    //     }else{
                    //         $refer_by->update([
                    //             'balance' => $refer_by->balance += $refer_by->left_amount*2,
                    //             'r_earning' => $refer_by->r_earning += $refer_by->left_amount*2,
                    //         ]);
                    //         Earning::create([
                    //             "user_id" => $refer_by->id,
                    //             "price" => $refer_by->left_amount*2,
                    //             "type" => 'matching_income'
                    //         ]);
                    //         $company_account->update([
                    //             'balance' => $company_account->balance -= $refer_by->left_amount*2,
                    //         ]);
                    //     }
                    // }
                }
                else{
                    $user->update([
                        'top_referral' => 'Pending',
                    ]);
                }
            }
            // $main_owner = User::find($user->main_owner);
            // if($main_owner->main_owner_referral->count() > 0 && $user->refer_by != $main_owner->id)
            // {
            //     $total_left = $main_owner->main_owner_referral->where('refer_type','Left')->count();
            //     $total_right = $main_owner->main_owner_referral->where('refer_type','Right')->count();
            //     if($total_left == $total_right)
            //     {
            //         $last_left_refferal = $main_owner->main_owner_referral->where('refer_type','Left')->last();
            //         if($last_left_refferal->left_amount > $last_left_refferal->right_amount)
            //         {
            //             $referral_left_amount = $last_left_refferal->right_amount; 
            //         }else{
            //             $referral_left_amount = $last_left_refferal->left_amount; 
            //         }
            //         $last_right_refferal = $main_owner->main_owner_referral->where('refer_type','Right')->last();
            //         if($last_right_refferal->left_amount > $last_right_refferal->right_amount)
            //         {
            //             $referral_right_amount = $last_right_refferal->right_amount; 
            //         }else{
            //             $referral_right_amount = $last_right_refferal->left_amount; 
            //         }
            //         if($referral_right_amount > $referral_left_amount)
            //         {
            //             $total_amount = $referral_left_amount; 
            //         }else{
            //             $total_amount = $referral_right_amount; 
            //         }
            //         $main_owner->update([
            //             'balance' => $main_owner->balance += $total_amount*2,
            //             'r_earning' => $main_owner->r_earning += $total_amount*2,
            //         ]);
            //         Earning::create([
            //             "user_id" => $main_owner->id,
            //             "price" => $total_amount*2,
            //             "type" => 'matching_income'
            //         ]);
            //         $company_account->update([
            //             'balance' => $company_account->balance -= $total_amount*2,
            //         ]);
            //     }
            // }
            // if($main_owner->main_owner_left->where('refer_type','Left')->count() == $main_owner->main_owner_right->where('refer_type','Right')->count())
            // {
            //     $last_left_ = $main_owner->main_owner_left->where('refer_type','Left')->last();
            //     $last_right= $main_owner->main_owner_right->where('refer_type','Right')->last();
            //     if($last_left_ != null && $last_right == null)
            //     {
            //         $logs = ReferralLog::where('leftUser',$last_left_->id)->where('rightUser',$last_right)
            //         ->where('main_owner',$main_owner)->first();
            //         if($logs == null)
            //         {
            //             if($last_left_->left_amount > $last_right->right_amount)
            //             {
            //                 $total_amounts = $last_right->right_amount; 
            //             }else{
            //                 $total_amounts = $last_left_->left_amount; 
            //             }
            //             $main_owner->update([
            //                 'balance' => $main_owner->balance += $total_amounts*2,
            //                 'r_earning' => $main_owner->r_earning += $total_amounts*2,
            //             ]);
            //             Earning::create([
            //                 "user_id" => $main_owner->id,
            //                 "price" => $total_amounts*2,
            //                 "type" => 'matching_income'
            //             ]);
            //             $company_account->update([
            //                 'balance' => $company_account->balance -= $total_amount*2,
            //             ]);
            //             ReferralLog::create([
            //                 "main_owner" => $main_owner->id,
            //                 "leftUser" => $last_left_->id,
            //                 "rightUser" => $last_right->id,
            //                 "amount" => $total_amounts*2,
            //                 "countLeft" => $main_owner->main_owner_left->where('refer_type','Left')->count(),
            //                 "countRight" => $main_owner->main_owner_right->where('refer_type','Right')->count(),
            //                 "type" => 'matching_income'
            //             ]);
            //         }
            //     }
               
                
            // }
        }
        // dd($deposit);
        $user->update([
            'status' => 'active',
            'a_date' => Carbon::today(),
            'package_id' => $deposit->package_id
        ]);
        $deposit->update([
            'status' => 'old'
        ]);
        $employee = Admin::where('email','adminr@pty.com')->first();
        $admin = Admin::where('email','admin1@mail.com')->first();
        $admin_amount = $deposit->amount/100 * 10; 
        $company_amount = $deposit->amount/100 * 80; 
        if($admin)
        {
            $admin->update([
                'balance' => $admin->balance += $admin_amount
            ]);
        }
        if($employee)
        {
            $employee->update([
                'balance' => $employee->balance += $admin_amount
            ]);
        }
        $company_account->update([
            'balance' => $company_account->balance += $company_amount,
        ]);
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
    public function ManageMatchingEarning()
    {
        $users = User::where('status','active')->get();
        foreach($users as $user)
        {
            $left_price = 0;
            $right_price = 0;
            if($user->right_refferal)
            {
                $rights =  $user->getOrginalRight();
                foreach($rights as $right)
                {
                    $right_price = $right_price + $right->package->price/100 *5;
                }
            }
            if($user->left_refferal)
            {
                $lefts =  $user->getOrginalLeft();
                foreach($lefts as $left)
                {
                    $left_price = $left_price + $left->package->price/100 *5;
                }
            }
            $user->update([
            //    'left_amount' => $user->left_amount += $left_price,
               'left_amount' => 0,
            //    'right_amount' => $user->right_amount += $right_price,
               'right_amount' => 0,
            ]);
        }
        // dd($users);
        return 'Done';
    }
}
