<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

class MailHelper
{
    public static function sendVerification($user){
        $data = ['code' => $user->verification];
        Mail::send('mail.index', $data, function ($message) use ($user){
            $message->from('support@payoncash.com', 'Pay on Cash');
            $message->to($user->email, $user->name)
            ->subject('Email Verification');
        });
    }
    
    public static function send($Message){
        $data = ['text' => $Message->message];
        Mail::send('admin.mail.index', $data, function ($message) use ($Message){
            $message->from('support@royalunitedtrader', 'Royal United Traders');
            $message->to($Message->email, $Message->name)
            ->subject('Reply from Support');
        });
    }

}
