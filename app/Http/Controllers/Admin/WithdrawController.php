<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    
    public function delete($id){
        Withdraw::find($id)->forceDelete();
        toastr()->success('Withdraw Request is Deleted Successfully');
        return redirect()->back();
    }
    
    public function hold($id)
    {
        $withdraw = Withdraw::find($id);

        // dd($deposit);
        $withdraw->update([
            'status' => 'On Hold',
        ]);     
        toastr()->success('Withdraw is on On Hold Now');

        return redirect()->back();
    }
     public function completed($id)
    {
        $withdraw = Withdraw::find($id);

        // dd($deposit);
        $withdraw->update([
            'status' => 'Completed',
        ]);     
        toastr()->success('Withdraw is Completed Now');

        return redirect()->back();
    }
}
