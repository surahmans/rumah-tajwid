<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
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

		return view('admin.administrator');
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

    public function data()
    {
        $users = User::select(Schema::getColumnListing('users'));

        return Datatables::of($users)
            ->add_column('actions',

                '<a href={{ action("UserController@edit", [$id])}} class="uk-icon-hover uk-icon-small uk-icon-pencil-square-o" alt="hapus"> </a>' .
                ' <a href={{ action("UserController@destroy", [$id])}} class="uk-icon-hover uk-icon-small uk-icon-trash-o"> </a>'
            )
            ->make(true);

    }
}
