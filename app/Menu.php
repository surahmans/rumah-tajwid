<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {


    /**
     * Define table should be use
     * @var string
     */
    protected $table = 'menu';

    /**
     * The attributes that are mass asignable
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'page'];

    public  $timestamps = false;

    public function submenu()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parentMenu()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
