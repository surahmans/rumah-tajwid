<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use ChrisKonnertz\OpenGraph\OpenGraph;

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
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$og = $this->openGraph();

		return view('front.main', compact('og'));
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

    /**
     * create open graph tags 
     * 
     * @return string          Open Graph Tags
     */
    public function openGraph()
    {
        $og = new OpenGraph();

        $og->title('Rumah Tajwid Indonesia')
        ->type('website')
        ->description('Hidup mulia dengan Al-Qur\'an.')
        ->url()
        ->siteName('Rumah Tajwid Indonesia');

        return $og;
    }

}
