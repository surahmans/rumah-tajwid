<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model {

    /**
     * Set fillable column
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    /**
     * Get the articles associated with the given tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
	}

    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }

}
