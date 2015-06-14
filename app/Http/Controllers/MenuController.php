<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MenuRequest;
use App\Menu;
use App\User;
use Collective\Html\FormFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use yajra\Datatables\Datatables;

class MenuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.menu.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.menu.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MenuRequest $request)
	{
		$menu = Menu::create($request->all());

        Session::flash('successMessage', 'Menu ' . $menu->name . ' berhasil ditambahkan.');

        return Redirect::route('admin.menu.index');
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
		$menu = Menu::findOrFail($id);

        Return view('admin.menu.update', compact('menu'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, MenuRequest $request)
	{
		$menu = Menu::findOrFail($id);

        $menu->update($request->all());

        Session::flash('successMessage', 'Menu ' . $menu->name . ' berhasil diubah.');

        return Redirect::route('admin.menu.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Menu::findOrFail($id)->delete();

        Session::flash('successMessage', 'Menu tersebut berhasil dihapus');

        return Redirect::route('admin.menu.index');
	}

    /**
     * Get data for datatables
     */
    public function data()
    {
        $menu = Menu::with('submenu')->whereNull('parent_id');

        return Datatables::of($menu)
            ->add_column('actions',

                '<a href={{ action("MenuController@edit", [$id])}} class="uk-icon-hover uk-icon-small uk-icon-pencil-square-o">Ubah</a>' .
                $this->deleteForm('{{$id}}')
            )
            ->make(true);
    }

    /**
     * Make delete button to handling delete menu
     *
     * @param $id
     * @return string
     */
    public function deleteForm($id)
    {
        $html = FormFacade::open(array('url' => 'admin/menu/'.$id, 'method' => 'DELETE', 'class' => 'uk-display-inline uk-margin-left'));
        $html .= FormFacade::submit("Hapus", array('class' => 'uk-button uk-button-primary uk-button-small uk-border-rounded', 'onClick' => 'return pesan();'));
        $html .= FormFacade::close();

        return $html;
    }

    /**
     * Display menu
     * @return Respone
     */
    public function indexOrder()
    {
    	$menu = Menu::whereNull('parent_id')->orderBy('order', 'ASC')->get();

    	return view('admin.config.menu.index', compact('menu'));
    }

    /**
     * Update menu order with ajax
     * @param  Request
     * @return Response
     */
    public function updateOrder(Request $request)	
    {
    	if($request->ajax()){
    		$menu = Menu::whereNull('parent_id')->orderBy('order', 'ASC')->get();
    		$itemID = $request->itemID;
    		$itemIndex = $request->itemIndex;

    		foreach ($menu as $item) {
    			return Menu::where('id', $itemID)->update(array('order' => $itemIndex));
    		}
	    }    	
    }

}
