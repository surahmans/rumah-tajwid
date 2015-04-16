<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

    protected $table = 'configs';

    public $timestamps = false;

	protected $fillable = [
        'category',
        'perpage',
        'viewall',
        'readmore',
        'maps',
        'address',
        'facebook',
        'twitter'
    ];

}
