<?php

namespace App\Models;

use App\Models\Helpers\SingletonModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Settings
 * @package App\Models
 *
 * @property integer $id
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Settings extends Model {
	use SingletonModel;
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
		'email',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'email' => 'string',
	];
}
