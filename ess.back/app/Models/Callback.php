<?php

namespace App\Models;

use App\Models\Helpers\CriteriaActions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Callback
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $region
 * @property string $message
 * @property integer $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Callback[]|Collection $callbacks
 *
 */
class Callback extends Model {
  use CriteriaActions;
	/**
	 * @var string
	 */
	protected $table = 'callbacks';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'phone',
		'email',
		'region',
		'message',
		'type',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'name' => 'string',
		'phone' => 'string',
		'email' => 'string',
		'region' => 'string',
		'message' => 'string',
		'type' => 'integer',
	];

  /**
   * @param Builder $query
   * @param string $value
   * @return bool
   */
  protected function getFullTextSearchColumn($query, $value): bool {
    return false;
  }
}
