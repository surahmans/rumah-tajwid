<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAnAdmin {

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
            if (! $request->user()->isAdmin())
            {
                return redirect('/author/article');
            }
        } else {
            return redirect('/login');
        }
		return $next($request);
	}

}
