<?php namespace App\Http\Controllers;

use App\Article;
use App\Configuration;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::with('user', 'tags')->find($id);

        if(is_null($article)) {
            abort(404);
        }

        $related = $this->getRelatedArticles($article);


        return view('front.article', compact('article', 'related'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    /**
     * Show articles by category
     *
     * @param $id
     */
    public function category($id)
    {
        $amount = Configuration::where('name', 'paginate')->first();

        $articles = Article::where('category_id', $id)->paginate($amount->value);

        return view('front.category', compact('articles'));
    }

    /**
     * Get related articles
     *
     * @return array of article
     */
    public function getRelatedArticles($article)
    {
        $related = Article::whereHas('tags', function ($query) use ($article) {
            $query->whereIn('id', $article->tags()->lists('id'));
        })->whereNotIn('id', [$article->id])->orderBy('id', 'DESC')->take(3)->get();
        return $related;
    }

}
