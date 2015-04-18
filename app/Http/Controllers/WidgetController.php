<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class WidgetController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $widget = Widget::first();

		return view('admin.widget', compact('widget'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$widget = Widget::findOrFail($id);

        $widget->update($request->all());

        Session::flash('successMessage', 'Pengaturan berhasil diubah');

        return Redirect::route('admin.widget.index');
	}

}
