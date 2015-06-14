<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;
use Collective\Html\FormFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use yajra\Datatables\Datatables;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.category.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CategoryRequest $request)
	{
        $name = $request->name;

        $data = array('slug' => Str::slug($name), 'name' => $name);

		$category = Category::create($data);

        Session::flash('successMessage', 'Kategori ' . $category->name . ' berhasil ditambahkan.');

        return Redirect::route('admin.category.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $category = Category::findOrFail($id);

		return view('admin.category.update', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CategoryRequest $request)
	{
		$category = Category::findOrFail($id);

        $name = $request->name;

        $data = array('name' => $name, 'slug' => Str::slug($name));

        $category->update($data);

        Session::flash('successMessage', 'Kategori tersebut berhasil diubah.');

        return Redirect::route('admin.category.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id);

        $category->delete();

        Session::flash('successMessage', 'Kategori tersebut berhasil dihapus.');

        return Redirect::route('admin.category.index');
	}

    /**
     * Get data for datatables
     */
    public function data()
    {
        $category = Category::select('*');

        return Datatables::of($category)
            ->add_column('actions',

                '<a href={{ action("CategoryController@edit", [$id])}} class="uk-icon-hover uk-icon-small uk-icon-pencil-square-o">Ubah</a>' .
                $this->deleteForm('{{$id}}')
            )
            ->make(true);
    }

    /**
     * Make delete button to handling delete tag
     *
     * @param $id
     * @return string
     */
    public function deleteForm($id)
    {
        $html = FormFacade::open(array('url' => 'admin/category/'.$id, 'method' => 'DELETE', 'class' => 'uk-display-inline uk-margin-left'));
        $html .= FormFacade::submit("Hapus", array('class' => 'uk-button uk-button-primary uk-button-small uk-border-rounded', 'onClick' => 'return pesan();'));
        $html .= FormFacade::close();

        return $html;
    }

    /**
     * Display Category
     * @return Respone
     */
    public function indexOrder()
    {
    	$categories = Category::orderBy('order', 'ASC')->get();

    	return view('admin.config.categories.index', compact('categories'));
    }

    /**
     * Update Category order with ajax
     * @param  Request
     * @return Response
     */
    public function updateOrder(Request $request)	
    {
    	if($request->ajax()){
    		$categories = Category::orderBy('order', 'ASC')->get();
    		$itemID = $request->itemID;
    		$itemIndex = $request->itemIndex;

    		foreach ($categories as $item) {
    			return Category::where('id', $itemID)->update(array('order' => $itemIndex));
    		}
	    }    	
    }

}
