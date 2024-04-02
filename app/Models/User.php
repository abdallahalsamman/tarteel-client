<?php

namespace App\Models;

use App\Filters\UserFilter;
use App\Providers\AppServiceProvider;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\User
 *
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string|null $phone_number
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $children
 * @property-read int|null $children_count
 * @property-read string $image_file
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read User|null $owner
 * @property-read \App\Models\Role $role
 * @method static UserFilter|User filter(array $filters)
 * @method static UserFilter|User newModelQuery()
 * @method static UserFilter|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static UserFilter|User orderByField($field, $direction)
 * @method static UserFilter|User query()
 * @method static UserFilter|User roleId($roleId = null)
 * @method static UserFilter|User search($term = null)
 * @method static UserFilter|User whereCreatedAt($value)
 * @method static UserFilter|User whereDeletedAt($value)
 * @method static UserFilter|User whereEmail($value)
 * @method static UserFilter|User whereEmailVerifiedAt($value)
 * @method static UserFilter|User whereId($value)
 * @method static UserFilter|User whereName($value)
 * @method static UserFilter|User whereParentId($value)
 * @method static UserFilter|User wherePassword($value)
 * @method static UserFilter|User wherePhoneNumber($value)
 * @method static UserFilter|User whereRememberToken($value)
 * @method static UserFilter|User whereRoleId($value)
 * @method static UserFilter|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
        'id' => 'integer',
        'email_verified_at' => 'datetime',
        'role_id' => 'integer',
    ];

    /**
     * Get the user's parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    /**
     * Get all children of the user if the user is a parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    /**
     * Get the user's role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new UserFilter($query);
    }

    /**
     *  Get user's image file.
     *
     * @return string
     */
    public function getImageFileAttribute()
    {
        if ($this->image === null) {
            return asset('images/default-user.png');
        }

        return Storage::disk('avatar')->url("{$this->image}");
    }

    /**
     * Does user have role admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role->isAdmin();
    }

    /**
     * Does user have role tutor.
     *
     * @return bool
     */
    public function isTutor()
    {
        return $this->role->isTutor();
    }

    /**
     * Does user have role parent.
     *
     * @return bool
     */
    public function isParent()
    {
        return $this->role->isParent();
    }

    /**
     * Does user have role student.
     *
     * @return bool
     */
    public function isStudent()
    {
        return $this->role->isStudent();
    }

    /**
     * Does user have permission.
     *
     * @param  string  $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->role->permissions()
            ->where('name', $permission)
            ->first() ? true : false;
    }

    /**
     * Get first user's permission.
     *
     * @param  string  $permissionName
     * @return bool
     */
    public function getPermission($permissionName)
    {
        return $this->role->permissions()
            ->where('name', $permissionName)
            ->first();
    }

    /**
     * Save user's image name.
     *
     * @return string
     */
    public function saveImage($imageName)
    {
        $this->update(['image' => $imageName]);
    }

    /**
     * Save user's password.
     *
     * @param  string  $password
     * @return mixed
     */
    public function savePassword($password)
    {
        return $this->update(['password' => Hash::make($password)]);
    }

    /**
     * Is auth user same as compared user.
     *
     * @param  \App\Models\User  $comparedUser
     * @return bool
     */
    public function isHimself($comparedUser)
    {
        return $this->is($comparedUser);
    }
}
