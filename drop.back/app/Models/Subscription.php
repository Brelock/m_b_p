<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Subscription
 * @package App\Models
 *
 * @property integer $id
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Subscription extends Model {
  /**
   * @var string
   */
  protected $table = 'subscriptions';

  /**
   * @var array
   */
  protected $fillable = [
    'email',
  ];
}
