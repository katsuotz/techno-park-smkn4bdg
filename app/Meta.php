<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
	protected $fillable = [
		'meta_name',
		'meta_content'
	];
}
