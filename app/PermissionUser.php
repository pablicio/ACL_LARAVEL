<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    protected $table    = 'permission_user';

    protected $fillable = ['name','label'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
