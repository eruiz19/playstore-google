<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = 'categorys';

    protected $fillable = ['name', 'created_at', 'updated_at'
 	];

 	public function apps()
 	{
 		return $this->hasMany('App\App')->withTimestamps();
 	}
}
