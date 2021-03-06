<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


     public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'user_name' => 'required',
            'password' => 'required',
        ]);
            
        $remember_me = $request->has('remember') ? true : false;

        $fieldType = filter_var($request->user_name, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        if(auth()->attempt(array($fieldType => $input['user_name'], 'password' => $input['password']),$remember_me))
        {
            return redirect()->route('home');
        }else{
            return redirect()->route('login')
                ->with('error','Tên đăng nhập hoặc mật khẩu sai.');
        }
          
    }
}
