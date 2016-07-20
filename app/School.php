<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
		'title',
		'institution',
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
