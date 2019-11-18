<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserActivationEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Mail;
use App\Mail\Auth\ActivationEmail;

class ActivationResendController extends Controller
{
    public function showResendForm()
    {
        return view('auth.activate.resend');
    }
    public function Resend(Request $request)
    {
        $this->ValidateResendRequest($request );
     $user = User::where('email',$request->email)->first();
        Mail::to($user['email'])->send(new ActivationEmail($user));
     return redirect()->route('auth.login')->with('message', 'Aktivasi email sudah dikirimkan');
    }
    protected function ValidateResendRequest(Request $request)
{
    $this->validate($request,[
    'email'=>'required|email|exists:users,email']
,['email.exists'=>'email ini belum terdaftar']);
}
}