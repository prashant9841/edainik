<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['category_id','order'];

    protected $casts = ['order' => 'integer'];

    public static function ordered()
    {
    	return self::orderBy('order','DESC');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
