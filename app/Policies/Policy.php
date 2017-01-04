<?php

namespace App\Policies;

use App\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class Policy
{
    use HandlesAuthorization;

    protected $slug;

    protected $ability;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        $this->ability = $ability;

        if($user->isRoot())
            return true;
    }

    public function show(User $user)
    {
        return $this->checkPermission($user, $this->slug . '-' . $this->ability);
    }

    public function update(User $user)
    {
        return $this->checkPermission($user, $this->slug . '-' . $this->ability);
    }

    public function create(User $user)
    {
        return $this->checkPermission($user, $this->slug . '-' . $this->ability);
    }

    public function delete(User $user)
    {
        return $this->checkPermission($user, $this->slug . '-' . $this->ability);
    }

    private function checkPermission(User $user, $permission)
    {
        $permission = Permission::where('name', $permission)->get()->first();

        return $user->hasPermissionRole($permission);

    }
}



