<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Request
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $question
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Request extends Model {
	/**
	 * @var string
	 */
	protected $table = 'requests';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'question'
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'name' => 'string',
		'email' => 'string',
		'question' => 'string',
	];
}
