<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUser
 * @package App\Models
 *
 * @property int $user_id
 * @property int $role_id
 */
class RoleUser extends Model {
  /**
   * @var string
   */
  protected $table = 'role_user';
}