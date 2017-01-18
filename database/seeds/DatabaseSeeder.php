<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // =========== generate data ===============//
        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
//        $this->call(PostsSeeder::class);
//
//        factory(App\User::class, 50)->create()->each(function($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//        });
        // =========== generate data ===============//



    }
}
