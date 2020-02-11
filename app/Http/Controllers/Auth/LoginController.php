<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use Admin;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $guard = 'admin';
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }
    public function guard()
    {
        return auth()->guard('admin');
    }
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('admin.home');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => [
                'required','string',
            Rule::exists('users')->where(function ($query)
    {
        $query->where('active',true);

    })
            ],
            'password' => 'required|string',
        ],[
            $this->username().'.exists'=> 'Email ini Invalid atau belum Aktif'


    ]);


    if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

        return redirect()->route('home');
    }
    else {

    }
    return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    public function logout(Request $request)
    {
       Auth::guard('web')->logout();
       Auth::guard('admin')->logout();
        return redirect('/');
    }
}
