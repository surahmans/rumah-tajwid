<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PageRequest;
use App\Page;
use Carbon\Carbon;
use Collective\Html\FormFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use yajra\Datatables\Datatables;

class PageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.page.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.page.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PageRequest $request)
	{
        $page = new Page($request->all());

        $page->published_at = Carbon::now();

        $page->slug = $this->checkSlug(Str::slug($request->title));

        Auth::user()->pages()->save($page);

        Session::flash('successMessage', 'Berhasil menambahkan halaman statis');

        return Redirect::route('admin.page.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
        $page = Page::where('slug', $slug)->first();

        if (is_null($page)) {
            abort(404);
        }

        return view('admin.page.show', compact('page'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::findOrFail($id);

        return view('admin.page.update', compact('page'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param PageRequest $request
     * @return Response
     */
	public function update($id, PageRequest $request)
	{
		$page = Page::findOrFail($id);

        $page->update($request->all());

        $page->slug = $this->checkSlug(Str::slug($request->title));

        $page->save();

        Session::flash('successMessage', 'Halaman statis berhasil diubah.');

        return Redirect::route('admin.page.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = Page::findOrFail($id);

        $page->delete();

        Session::flash('successMessage', 'Halaman tersebut berhasil dihapus.');

        return Redirect::route('admin.page.index');
	}

    /**
     * Get data for datatables
     */
    public function data()
    {
        $articles = Page::select('*');

        return Datatables::of($articles)
            ->add_column('actions',

                '<a href={{ route("admin.page.edit", $id)}} class="uk-icon-hover uk-icon-small uk-icon-pencil-square-o"></a>' .
                '<a href={{ route("page.show", $slug)}} class="uk-icon-hover uk-icon-small uk-icon-eye" target="_blank" style="margin-left:15px;"></a>' .
                $this->deleteForm('{{$id}}')
            )
            ->make(true);
    }

    /**
     * Make delete button to handling delete page
     *
     * @param $id
     * @return string
     */
    public function deleteForm($id)
    {
        $html = FormFacade::open(array('url' => Auth::user()->level . '/page/'.$id, 'method' => 'DELETE', 'class' => 'uk-display-inline uk-margin-left'));
        $html .= FormFacade::submit("Hapus", array('class' => 'uk-button uk-button-primary uk-button-small uk-border-rounded', 'onClick' => 'return pesan();'));
        $html .= FormFacade::close();

        return $html;
    }

    /**
     * Generate unique slug
     *
     * @param $slug
     * @param $no
     * @return string
     */
    public function checkSlug($slug, $no = 1)
    {

        if (Page::where('slug', $slug)->count()) {

            $no += 1;
            $no_slug = $no . '-' . $slug;

            if (Page::where('slug', $no_slug)->count()) {
                return $this->checkSlug($slug, $no);
            } else {
                return $no_slug;
            }

        } else {
            return $slug;
        }
    }

}
