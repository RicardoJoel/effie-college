<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;

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
        $request->session()->flush();
        $input = $request->all();
   
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password'])))
            if (!Auth::user()->is_admin && Auth::user()->situation !== 'TUTOR' && Auth::user()->caso->edition->name !== date('Y')){
                $this->logout($request);
                return Redirect::route('login')->with('error','Cuenta no habilitada para la edición actual');
            }
            else if (Auth::user()->situation === 'NO VALIDADO'){
                $this->logout($request);
                return Redirect::route('login')->with('error','Equipo no validado por la institución educativa');
            }
            else
                return Redirect::route('home');
        else
            return Redirect::route('login')->with('error','Usuario o contraseña incorrectos');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/login');
    }
}