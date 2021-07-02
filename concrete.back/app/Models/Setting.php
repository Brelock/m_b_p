<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Setting
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $email
 * @property string $footer
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Setting extends Model {
	/**
	 * @var string
	 */
	protected $table = 'settings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'subtitle',
		'email',
		'footer'
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'title' => 'string',
		'subtitle' => 'string',
		'email' => 'string',
		'footer' => 'string',
	];
}
