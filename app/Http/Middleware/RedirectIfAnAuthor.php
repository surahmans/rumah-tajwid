<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAnAuthor {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if (Auth::check())
        {
            if (! $request->user()->isAnAuthor())
            {
                return redirect('/admin');
            }
        } else {
            return redirect('/login');
        }

		return $next($request);
	}

}
