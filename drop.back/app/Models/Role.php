<?php

namespace App\Models;

use App\Models\Scopes\CriteriaScopes;
use App\Models\Scopes\RoleScopes;
use Illuminate\Database\Eloquent\Collection;
use Zizaco\Entrust\EntrustRole;

/**
 * Class Role
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property int $is_default
 * @property int $type
 * @property int $users_count
 *
 * @property Permission[]|Collection $perms
 */
class Role extends EntrustRole {
    use RoleScopes;
    use CriteriaScopes;

    protected $withCount=['users'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description', 'rules'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function getFullTextSearchColumn($query, $value) {
        return 'name';
    }
}
