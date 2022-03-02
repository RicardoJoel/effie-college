<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\User;
use Redirect;
use Auth;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());
        $user = Auth::user();
        $user->password = Hash::make($request['new_password']);
        $user->save();
        return Redirect::back()->with('success','Tu contraseña fue actualizada de manera exitosa.');
    }
    
    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'email' => 'required',
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|different:email|min:8|max:20',
            'new_confirm_password' => ['same:new_password'],
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
            'new_password.different' => 'La nueva contraseña no puede ser igual a tu correo electrónico.',
            'new_password.min' => 'La nueva contraseña debe contener entre 8 y 20 caracteres.',
            'new_password.max' => 'La nueva contraseña debe contener entre 8 y 20 caracteres.',
            'new_confirm_password.same' => 'Las nuevas contraseñas ingresadas no coinciden.',
        ];
    }
}