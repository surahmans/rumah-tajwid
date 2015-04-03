<?php namespace App\Providers;

use App\Article;
use App\Category;
use App\Configuration;
use App\Menu;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->composeNavigation();
        $this->composePopular();
        $this->composeRecent();
        $this->composeBlogs();
        $this->composeConfig();
        $this->composeSlideshow();
    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

    /**
     * Top navigation
     */
    public function composeNavigation()
    {
        view()->composer('front.partials.nav', function ($view) {
            $menus = Menu::with('submenu')->get();
            $view->with('menus', $menus);
        });
    }

    /**
     * Popular posts
     */
    public function composePopular()
    {
        view()->composer('front.partials.sidebar', function ($view) {
            $popular = Article::all()->sortByDesc('views')->take(5);
            $view->with('popular', $popular);
        });
    }

    /**
     * Recent posts
     */
    public function composeRecent()
    {
        view()->composer('front.partials.sidebar', function ($view) {
            $recent = Article::all()->sortByDesc('id')->take(5);
            $view->with('recent', $recent);
        });
    }

    /**
     * Show blogs
     */
    public function composeBlogs()
    {
        view()->composer('front.partials.blogs', function ($view) {
            $blogs = Category::with(array('articles' => function($query) {
                $query->orderBy('id', 'DESC');
            }))->get();
            $view->with('blogs', $blogs);
        });
    }

    /**
     * Web config
     */
    public function composeConfig()
    {
        view()->composer('front.partials.footer',  function($view) {
            $configs = Configuration::all();
            $view->with('configs', $configs);
        });
    }

    /**
     * Show slide show
     */
    public function composeSlideshow()
    {
        view()->composer('front.partials.slide', function($view) {
            $slides = Article::where('slide', 1)->orderBy('id', 'DESC')->get();
            $view->with('slides', $slides);
        });
    }
}
