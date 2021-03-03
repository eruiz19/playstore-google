<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    
    protected $table = 'apps';

    protected $fillable = ['name',
 		'price', 'picture', 'description', 'category_id', 'created_at', 'updated_at'
 	];

 	public function category()
 	{
 		return $this->belongsTo('App\Category')->withTimestamps();
 	}
}
