<?php namespace App\Http\Controllers;

use App\Configuration;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ConfigurationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ConfigurationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $config = Configuration::first();

		return view('admin.config', compact('config'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ConfigurationRequest $request
     * @return Response
     */
	public function update($id, ConfigurationRequest $request)
	{
		$config = Configuration::findOrFail($id);

        $config->update($request->all());

        Session::flash('successMessage', 'Pengaturan berhasil dirubah.');

        return Redirect::route('admin.config');
	}

}
