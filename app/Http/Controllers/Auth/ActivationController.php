<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Admin;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = User::where('email',$request->email)->where('activation_token',$request->token)->firstOrFail();

        $user->update([
            'active' => true,
            'activation_token' => null
        ]);
        Auth::loginUsingId($user->id);

        return redirect()->route('home')->with('Success','Akun anda Sudah Aktif! ');
    }

    public function activateAdmin(Request $request)
    {
        $Admin = Admin::where('email',$request->email)->where('activation_token',$request->token)->firstOrFail();

        $Admin->update([
            'active' => true,
            'activation_token' => null
        ]);
        Auth::loginUsingId($Admin->id);

        return redirect()->route('/admin')->with('Success','Akun anda Sudah Aktif! ');
    }
}
