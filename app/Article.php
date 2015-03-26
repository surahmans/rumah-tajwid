<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $table = "articles";

    protected $fillable = [
        'cover',
        'title',
        'body',
        'user_id',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
