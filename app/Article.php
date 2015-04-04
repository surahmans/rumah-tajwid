<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    /**
     * Get article excerpt
     * @return string
     */
    public function getExcerptAttribute()
    {
        return Str::limit($this->body, 200, '...');
    }

    /**
     * Get the tags associated with the given article
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
