<?php

namespace App\Models;

use App\Filters\RoleFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static RoleFilter|Role filter(array $filters)
 * @method static RoleFilter|Role newModelQuery()
 * @method static RoleFilter|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role onlyTrashed()
 * @method static RoleFilter|Role orderByField($field, $direction)
 * @method static RoleFilter|Role query()
 * @method static RoleFilter|Role search($term = null)
 * @method static RoleFilter|Role whereCreatedAt($value)
 * @method static RoleFilter|Role whereDeletedAt($value)
 * @method static RoleFilter|Role whereId($value)
 * @method static RoleFilter|Role whereLabel($value)
 * @method static RoleFilter|Role whereName($value)
 * @method static RoleFilter|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutTrashed()
 * @mixin \Eloquent
 */
class Role extends Model
{
    use SoftDeletes;

    const ADMIN = 'admin';
    const PARENT = 'parent';
    const TUTOR = 'tutor';
    const STUDENT = 'student';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * The permissions that belong to the role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)
            ->withPivot('owner_restricted')
            ->using(PermissionRole::class);
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new RoleFilter($query);
    }

    /**
     * Create role's permissions.
     *
     * @param  array  $permissions
     * @return void
     */
    public function createPermissions($permissions)
    {
        $permissions = $this->removeDisallowedPermissions($permissions);

        $this->permissions()->attach($this->dataToSync($permissions));
    }

    /**
     * Does role have permission.
     *
     * @param  string  $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->permissions()
            ->where('name', $permission)
            ->first() ? true : false;
    }

    /**
     * Update role's permissions.
     *
     * @param  array  $permissions
     * @return void
     */
    public function updatePermissions($permissions)
    {
        $permissions = $this->removeDisallowedPermissions($permissions);

        $this->permissions()->sync($this->dataToSync($permissions));
    }

    /**
     * Is this an admin role.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->name === 'admin';
    }

    /**
     * Is this an tutor role.
     *
     * @return bool
     */
    public function isTutor()
    {
        return $this->name === 'tutor';
    }

    /**
     * Is this an parent role.
     *
     * @return bool
     */
    public function isParent()
    {
        return $this->name === 'parent';
    }

    /**
     * Is this an student role.
     *
     * @return bool
     */
    public function isStudent()
    {
        return $this->name === 'student';
    }

    /**
     * Remove permissions where allowed is false.
     *
     * @param  array  $permissions
     * @return array
     */
    protected function dataToSync($permissions)
    {
        $dataForSync = [];
        foreach ($permissions as $id => $permission) {
            $dataForSync[$id] = ['owner_restricted' => $permission['owner_restricted'] ?? false];
        }

        return $dataForSync;
    }

    /**
     * Remove permissions where allowed is false.
     *
     * @param  array  $permissions
     * @return array
     */
    protected function removeDisallowedPermissions($permissions)
    {
        return array_filter($permissions, function ($permission) {
            return $permission['allowed'];
        });
    }
}
