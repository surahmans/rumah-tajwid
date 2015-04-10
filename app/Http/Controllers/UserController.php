<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\User;
use Collective\Html\FormFacade;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use yajra\Datatables\Datatables;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return view('admin.users.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		$user = User::create($request->all());

        Session::flash('successMessage', 'Berhasil menambahkan ' . $user->name);

        return view('admin.users.index');
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
        $user = User::findOrFail($id);

		return view('admin.users.update', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UserRequest $request, $id)
	{
		$user = User::findOrFail($id);

        $user->update($request->all());

        Session::flash('successMessage', 'Berhasil mengubah data pengguna dengan nama ' . $user->name);

        return Redirect::route('admin.user.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        User::destroy($id);

        Session::flash('successMessage', 'Pengguna tersebut berhasil dihapus');

        return Redirect::route('admin.user.index');
	}

    /**
     * Get data for datatables
     */
    public function data()
    {
        $users = User::select(Schema::getColumnListing('users'));

        return Datatables::of($users)
            ->add_column('actions',

                '<a href={{ action("UserController@edit", [$id])}} class="uk-icon-hover uk-icon-small uk-icon-pencil-square-o">Ubah</a>' .
                 $this->deleteForm('{{$id}}')
            )
            ->make(true);
    }

    /**
     * Make delete button to handling delete user
     *
     * @param $id
     * @return string
     */
    public function deleteForm($id)
    {
        $html = FormFacade::open(array('url' => 'admin/user/'.$id, 'method' => 'DELETE', 'class' => 'uk-display-inline uk-margin-left'));
        $html .= FormFacade::submit("Hapus", array('class' => 'uk-button uk-button-primary uk-button-small uk-border-rounded', 'onClick' => 'return pesan();'));
        $html .= FormFacade::close();

        return $html;
    }
}
