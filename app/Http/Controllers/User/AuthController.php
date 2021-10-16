<?php

namespace App\Http\Controllers\User;
use App\Helpers\Message;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('name',$request->name)->first();
        if($user){
            if($user->status == 'block')
            {
            toastr()->error('You are Blocked,Kindly Contact Support');
            return redirect()->back();
             }
        }


        $user = User::where('name',$request->name)->first();
        if(!$user){
            toastr()->error('Please register your account');
            return redirect()->back();
        }

        $creds = [
            'name' => $request->name,
            'password' => $request->password
        ];
        if(Auth::guard('user')->attempt($creds)){
            $user = Auth::guard('user')->user();
            // if($user->status == 'active'){
            //     if(Carbon\Carbon::today()->diffInDays($user->packageExpires() < 0))
            //     {
            //         $user->status == 'pending';
            //     }
            // }
            toastr()->success('Login Successfully');
            return redirect('user/dashboard');
        } else {
            toastr()->error('Wrong Password','Please Contact Support');
            return redirect()->back();
            
        }
    }
    public function register(Request $request)
    {
        if($request->code)
        { 
         
            $user= User::where('code',$request->code)->first();
            
            if($user){
            //     $user->balance+= (($user->package->r_earning/100)*$user->package->price);
            //     $user->save();
             $validator = Validator::make($request->all(),[
                'name' => 'required|unique:users'
            ]);

            if($validator->fails()){
                toastr()->error('Username  already exists');
                return redirect()->back();
            }
                User::create([
                    'code' => uniqid(),
                    'refer_by' => $user->id
                ]+$request->all());
            }
        }else{
           $validator = Validator::make($request->all(),[
                'name' => 'required|unique:users'
            ]);

            if($validator->fails()){
                toastr()->error('Username  already exists');
                return redirect()->back();
            }
            User::create([
                'code' => uniqid()
            ]+$request->all());
            
        }
        //   Message::send($request->phone,'Dear ' 
        //   .$request->fname. 
        //     'Thanks for registering at Advertfox. We are glad that 
        //     you have choosen to ba a part of our.
        //     Advertfox is a worldwide investment company who is committied 
        //     to the principle of revenew maximization and reduction of financial risk.
        //     For further details: 03442200408
        //     Visit: https://advertfoxx.com/
        //     ');
        toastr()->success('Your Account Has Been successfully Created, Please Login and See Next Step Guides.');
        return redirect(route('user.login'));
    }
    public function code($code)
    {
        return view('user.auth.register')->with('code',$code);
    }
    public function logout()
    {
        Auth::logout();
        toastr()->success('You Logout Successfully');
        return redirect('/');
    }

    public function sendVerification(Request $request){
        $user = User::where('name',$request->email)->first();
        if(!$user){
            toastr()->error('User not found');
            return redirect()->back();
        }
        $user->verification = uniqid();
        $user->save();
        // Message::send($user->phone,'AOA! Welcome to Pay Earn Cash '
        // .$user->verification.
        //     ' Your Verification Code
        //     NOW RESET YOUR PASSWORD AND START EARNING NOW
        //     PAY EARN CASH 
        //     ');        
        return redirect()->route('user.reset');
    }

    public function resetPassword(Request $request){
        $user = User::where('verification',$request->verfication)->first();
        if($user){
            $user->update([
                'password' => $request->password
            ]);
            toastr()->success('Password reset successfully');
            return redirect('user/login');
        } else {
            toastr()->error('Incorrect code');
            return redirect()->back();
        }
    }

}
