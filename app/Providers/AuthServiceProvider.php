<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\Post;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

//        $permissions = Permission::with('roles')->get();
//
//        foreach ($permissions as $permission)
//        {
//            $gate->define($permission->name, function (User $user) use ($permission) {
//
//                return $user->hasPermission($permission);
//            });
//        }
//
//        $gate->before(function (User $user,$ability){
//            if($user->hasAnyRoles('Admin'))
//                return  true;
//        });
   }
}
