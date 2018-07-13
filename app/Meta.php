<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
	protected $fillable = [
		'meta_name',
		'meta_content'
	];

	public static function get($meta_name)
	{
		return Meta::where('meta_name', $meta_name)->first()->meta_content ?? null;
	}
}
