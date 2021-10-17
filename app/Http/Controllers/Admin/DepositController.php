<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Message;
use App\Http\Controllers\Controller;
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
            if($user->refer_type == 'Left')
            {
                $direct_income = $deposit->amount/100 * 10;
                if($refer_by->left_refferal == null)
                {
                    $refer_by->update([
                        'left_refferal' => $user->id,
                        'balance' => $refer_by->balance += $direct_income,
                        'r_earning' => $refer_by->r_earning += $direct_income,
                    ]);
                    Earning::create([
                        "user_id" => $refer_by->id,
                        "price" => $direct_income,
                        "type" => 'direct_income'
                    ]);
                }else{

                }
            }else{
                $direct_income = $deposit->amount/100 * 10;
                if($refer_by->right_refferal == null)
                {
                    $refer_by->update([
                        'right_refferal' => $user->id,
                        'balance' => $refer_by->balance += $direct_income,
                        'r_earning' => $refer_by->r_earning += $direct_income,
                    ]);
                    Earning::create([
                        "user_id" => $refer_by->id,
                        "price" => $direct_income,
                        "type" => 'direct_income'
                    ]);
                }else{

                }
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
