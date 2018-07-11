<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'title',
		'content',
		'image',
		'slug',
		'created_at'
	];

	protected $dates = [
		'created_at',
		'updated_at'
	];
}
