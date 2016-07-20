<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
	protected $fillable = [
		'title',
		'employer',
		'start',
		'end',
		'description',
		'website',
		'location',
	];

    /**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['start', 'end'];
}
