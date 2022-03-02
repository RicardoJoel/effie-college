<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
        ]);
    }

    /**
     * Get the needed authentication credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $user = User::where('username',$request->username)->first();
        if ($user !== NULL) {
            if ($user->situation === 'JURADO') {
                $user->email = $request->email;
                $user->save();
            }
            else {
                $found = false;

                foreach ($user->students as $student)
                    if ($student->student_email === $request->email)
                        $found = true;
                
                if ($found || ($user->teacher->teacher_email === $request->email)){
                    $user->email = $request->email;
                    $user->save();
                    $found = true;
                }
                if (!$found) return array();
            }
        }
        return $request->only('username');
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return $request->wantsJson()
                    ? new JsonResponse(['message' => trans($response)], 200)
                    : redirect('login')->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }

        $user = User::where('username',$request->username)->first();
        
        return back()->with('error', 
            $user !== NULL ? 
            'El correo ingresado no pertenece a ningún miembro del equipo.' :
            'No hemos podido encontrar un usuario con ese nombre.');
    }
}