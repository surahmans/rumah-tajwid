<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    protected $table = "pages";

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'slug',
        'published_at',
    ];

    /**
     * Get owner of page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
