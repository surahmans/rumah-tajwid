<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        // Other user cannot modify another user profile (except an admin)
        if (Auth::user()->level != 'admin') {
            if (Auth::user()->id != User::findOrFail($this->id)->id) {

                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {

            //User can blank the password when updating
            $rules = [
                'name'      => 'required|min:3',
                'email'     => 'email|required|unique:users,email,'.$this->segment(3),
                'password'  => 'min:6|confirmed',
                'password_confirmation' => ''
            ];
        } else {

            //Admin must fill the password when creating user
            $rules = [
                'name'      => 'required|min:3',
                'email'     => 'email|required|unique:users,email,1'.$this->segment(3),
                'password'  => 'required|min:6|confirmed',
                'password_confirmation' => ''
            ];
        }

        return $rules;
	}

}
