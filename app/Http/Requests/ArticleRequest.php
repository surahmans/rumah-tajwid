<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request {

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

        if ($this->method() != 'PUT') {

            $rules = [
                'cover'     => 'required|image|max:2048',
                'title'     => 'required',
                'body'      => 'required',
                'tag_list'      => 'required',
            ];

        } else {

            $rules = [
                'cover'     => 'image|max:2048',
                'title'     => 'required',
                'tag_list'      => 'required',
            ];

        }

        return $rules;
	}

}
