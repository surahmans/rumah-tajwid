<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('front.main');
	}

    public function category()
    {
        return view('front.category');
    }

    public function article()
    {
        return view('front.article');
    }

    public function test()
    {
        $art = DB::query('select * from articles');

        return $art;
    }

}
