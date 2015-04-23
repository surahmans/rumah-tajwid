<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MenuRequest;
use App\Menu;
use Collective\Html\FormFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use yajra\Datatables\Datatables;

class SubmenuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.submenu.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $parentIds = Menu::whereNull('parent_id')->lists('name', 'id');

        return view('admin.submenu.create', compact('parentIds'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MenuRequest $request)
	{
		$submenu = Menu::create($request->all());

        Session::flash('successMessage', 'Berhasil menambahkan submenu ' . $submenu->name);

        return Redirect::route('admin.submenu.index');
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
		$submenu = Menu::findOrFail($id);

        $parentIds = Menu::whereNull('parent_id')->lists('name', 'id');

        return view('admin.submenu.update', compact('submenu', 'parentIds'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, MenuRequest $request)
	{
		$submenu = Menu::findOrFail($id);

        $submenu->update($request->all());

        Session::flash('successMessage', 'Submenu ' . $submenu->name . ' berhasil diubah');

        return Redirect::route('admin.submenu.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$submenu = Menu::findOrFail($id)->delete();

        Session::flash('successMessage', "Submenu tersebut berhasil dihapus");

        return Redirect::route('admin.submenu.index');
	}

    /**
     * Get data for datatables
     */
    public function data()
    {
        $submenu = Menu::with('parentMenu')->whereNotNull('parent_id');

        return Datatables::of($submenu)
            ->add_column('actions',

                '<a href={{ action("SubmenuController@edit", [$id])}} class="uk-icon-hover uk-icon-small uk-icon-pencil-square-o">Ubah</a>' .
                $this->deleteForm('{{$id}}')
            )
            ->make(true);
    }

    /**
     * Make delete button to handling delete submenu
     *
     * @param $id
     * @return string
     */
    public function deleteForm($id)
    {
        $html = FormFacade::open(array('url' => 'admin/submenu/' . $id, 'method' => 'DELETE', 'class' => 'uk-display-inline uk-margin-left'));
        $html .= FormFacade::submit("Hapus", array('class' => 'uk-button uk-button-primary uk-button-small uk-border-rounded', 'onClick' => 'return pesan();'));
        $html .= FormFacade::close();

        return $html;
    }

}
