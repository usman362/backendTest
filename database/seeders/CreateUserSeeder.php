<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);


        $moderator = User::create([
            'name' => 'Moderator',
            'email' => 'moderator@gmail.com',
            'password' => bcrypt('moderator123')
        ]);

        $role = Role::create(['name' => 'Moderator']);

        $permissions = Permission::where('name','article-list')->Orwhere('name','article-create')->pluck('id','id');

        $role->syncPermissions($permissions);

        $moderator->assignRole([$role->id]);
    }
}
