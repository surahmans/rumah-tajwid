<?php namespace App\Http\Controllers;

use Auth;
use Request;


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
            return redirect()->intended('/admin');
        } else {

            session()->flash('unsuccessful', 'Username atau password yang Anda masukan salah!');

            return redirect()->back();
        }
    }

    /**
     * User logout
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

}