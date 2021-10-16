<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Message;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function active($id)
    {
        $deposit = Deposit::find($id);
        $user = $deposit->user; 

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
