<?php namespace App\Http\Controllers;

use Auth;
use Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller {

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        if (Auth::attempt(['email' => Request::input('email'), 'password' => Request::input('password')]))
        {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back();
        }
    }

}