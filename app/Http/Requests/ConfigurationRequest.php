<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConfigurationRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'category'  => 'required',
            'perpage'   => 'required',
            'viewall'   => 'required|string',
            'readmore'  => 'required|string',
            'maps'      => 'required|string',
            'facebook'  => 'required|url',
            'twitter'   => 'required|string',
            'address'   => 'required'
		];
	}

}
