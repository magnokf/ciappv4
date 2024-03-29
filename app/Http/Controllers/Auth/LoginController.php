<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


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

    public function authenticated(Request $request, $user)
    {
        if (!$user->client){
            Auth::logout();
            flash('Usuário precisa de autorização do comando para utilizar o ciApp, tente mais tarde.');
            return redirect()->route('login');
        }
        Auth::logoutOtherDevices($request->get('password'));

            $user->timestamps = false;
            $user->last_login_at = Carbon::now()->toDateTimeString();
            $user->last_login_ip = $request->getClientIp();
            $user->save();
    }

    public function username()
    {
        return 'rg';
    }


}
