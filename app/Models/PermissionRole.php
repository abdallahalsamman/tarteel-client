<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\PermissionRole
 *
 * @property int $id
 * @property int $permission_id
 * @property int $role_id
 * @property bool|null $owner_restricted
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole whereOwnerRestricted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole whereRoleId($value)
 * @mixin \Eloquent
 */
class PermissionRole extends Pivot
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'owner_restricted' => 'boolean',
        'role_id' => 'integer',
        'permission_id' => 'integer',
    ];
}
