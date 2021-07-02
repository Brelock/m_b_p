<?php

namespace App\Models;

use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\UserMixin;
use App\Models\Scopes\UserScopes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property string $full_name
 *
 * @property Role $role
 */
class User extends Authenticatable implements JWTSubject {
  use Notifiable, SoftDeletes, EntrustUserTrait, CriteriaActions, UserScopes, UserMixin;

  use SoftDeletes {
    SoftDeletes::restore insteadof EntrustUserTrait;
  }

  use EntrustUserTrait {
    delete as private entrustDelete;
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * @return bool|null
   * @throws \Exception
   */
  public function delete() {
    return parent::delete();
  }

  /**
   * @return mixed
   */
  public function getJWTIdentifier() {
    return $this->getKey();
  }

  /**
   * @return array
   */
  public function getJWTCustomClaims() {
    return [];
  }

  /**
   * Get first role.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
   */
  public function role() {
    return $this->hasOneThrough(
      Role::class,
      RoleUser::class,
      'user_id',
      'id',
      'id',
      'role_id'
    );
  }
}
