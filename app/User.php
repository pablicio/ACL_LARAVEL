<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_user', 'user_id', 'permission_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'user_id');
    }

    public function hasSinglePermission(Permission $permission)
    {
        return $this->permissions()->where('user_id', $this->id)->where('permission_id', $permission->id)->first();
    }

    public function hasPermissionRole(Permission $permission)
    {
        return self::hasAnyRoles(auth()->user()->roles, $permission);
    }

    public function hasAnyRoles($roles,$permission = null)
    {

        if(is_array($roles) || is_object($roles))
        {
            if($roles->isEmpty())
                return self::hasSinglePermission($permission);
            else
                return !! $roles->intersect($this->roles)->count();


        }

        return $this->roles->contains('name',$roles);
    }

    public function isRoot()
    {
        if(self::hasAnyRoles('Root'))
            return true;
    }
}
