<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'level'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * Check if the user an author
     *
     * @return bool
     */
    public function isAnAuthor()
    {
        if (Auth::user()->level == 'author')
        {
            return true;
        }
    }

    /**
     * Check if the user an admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        if (Auth::user()->level == 'admin')
        {
            return true;
        }
    }

    /**
     * Set password to be encrypted when store and don't rehashed (When resetting)
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {

        if (Hash::needsRehash($value))
        {
            $this->attributes['password'] = Hash::make($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }

    /**
     * Get page associated with the owner
     */
    public function pages()
    {
        return $this->hasMany('App\Page');
    }
}
