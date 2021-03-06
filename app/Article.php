<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model {

	protected $table = "articles";

    protected $fillable = [
        'cover',
        'title',
        'body',
        'user_id',
        'slug',
        'slide',
        'category_id'
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
        return strip_tags(Str::limit($this->body, 200, '...'));
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

    /**
     * Get tag list id associated with the article
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }

    /**
     * get published articles
     * 
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '!=', '0000-00-00 00:00:00');
    }
}
