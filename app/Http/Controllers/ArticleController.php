<?php namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Configuration;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use App\User;
use Carbon\Carbon;
use Collective\Html\FormFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use yajra\Datatables\Datatables;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.article.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $categories = Category::all()->lists('name', 'id');

		return view('admin.article.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
        $article = New Article($request->except('cover'));

        Auth::user()->articles()->save($article);

        $article->published_at = Carbon::now();

        $this->saveImage($request, $article);

        Session::flash('successMessage', 'Berhasil menambahkan artikel.');

        return Redirect::route('admin.article.index');
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
		$article = Article::findOrFail($id);
        $categories = Category::all()->lists('name', 'id');

        return view('admin.article.update', compact('article', 'categories'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $requests
     * @return Response
     */
	public function update($id, ArticleRequest $requests)
	{
        $article = Article::findOrFail($id);

        if (Input::hasFile('cover')) {

            $this->deleteImageOnUpdate($article);

            $this->saveImage($requests, $article);
        }

        $article->update($requests->except('cover'));

        Session::flash('successMessage', 'Artikel berhasil diubah.');

        return Redirect::route('admin.article.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::findOrFail($id);

        // call delete image method
        $this->deleteImageOnUpdate($article);

        $article->delete();

        Session::flash('successMessage', 'Artikel berhasil dihapus.');

        return Redirect::route('admin.article.index');
	}


    /**
     * Get articles by category id
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function category($id)
    {
        $amount = Configuration::first();

        $articles = Article::where('category_id', $id)->paginate($amount->perpage);

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

    /**
     * Get articles by tag id
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function tag($id)
    {
        $amount = Configuration::first();

        $articles = Article::whereHas('tags', function($query) use ($id) {
            $query->where('id', $id);
        })->orderBy('id', 'DESC')->paginate($amount->perpage);

        return view('front.tag', compact('articles'));
    }

    /**
     * Get data for datatables
     */
    public function data()
    {
        $articles = Article::with('user', 'category');

        return Datatables::of($articles)
            ->add_column('actions',

                '<a href={{ action("ArticleController@edit", [$id])}} class="uk-icon-hover uk-icon-small uk-icon-pencil-square-o">Ubah</a>' .
                $this->deleteForm('{{$id}}')
            )
            ->make(true);
    }

    /**
     * Generate unique slug
     *
     * @param $slug
     * @param $no
     * @return string
     */
    public function checkSlug($slug, $no)
    {

        if (Article::where('slug', $slug)->count()) {

            $no += 1;
            $no_slug = $no . '-' . $slug;

            if (Article::where('slug', $no_slug)->count()) {
                return $this->checkSlug($slug, $no);
            } else {
                return $no_slug;
            }

        } else {
            return $slug;
        }
    }

    /**
     * Save an image
     *
     * @param ArticleRequest $request
     * @param $article
     */
    public function saveImage(ArticleRequest $request, $article)
    {
        $uploaded_image = $request->file('cover');

        $extension = $uploaded_image->getClientOriginalExtension();
        $filename = md5(time()) . '.' . $extension;

        $destination_path = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'article';

        $uploaded_image->move($destination_path, $filename);

        $article->cover = $filename;

        $article->slug = $this->checkSlug(Str::slug($request->title), 1);

        $article->save();

        // open file a image resource
        $img = Image::make($destination_path . DIRECTORY_SEPARATOR . $filename);

        // resize to 70x70 pixel with image ratio
        $img->fit(70, 70);

        $img->save($destination_path . DIRECTORY_SEPARATOR . 'thumb' . DIRECTORY_SEPARATOR . $filename);
    }

    /**
     * Delete old image when user update it
     * @param $article
     */
    public function deleteImageOnUpdate($article)
    {
        $old_cover = public_path() . '/images/article/' . $article->cover;
        $old_cover_thumb = public_path() . '/images/article/thumb/' . $article->cover;

        File::delete($old_cover);
        File::delete($old_cover_thumb);
    }

    /**
     * Make delete button to handling delete article
     *
     * @param $id
     * @return string
     */
    public function deleteForm($id)
    {
        $html = FormFacade::open(array('url' => 'admin/article/'.$id, 'method' => 'DELETE', 'class' => 'uk-display-inline uk-margin-left'));
        $html .= FormFacade::submit("Hapus", array('class' => 'uk-button uk-button-primary uk-button-small uk-border-rounded', 'onClick' => 'return pesan();'));
        $html .= FormFacade::close();

        return $html;
    }
}
