<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'subadmin',
            ],
            [
                'name' => 'user'
            ]
        ];
        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }
        $permissions = Permission::get();
        $admin = Role::where('name','admin')->first();
        $subadmin = Role::where('name','subadmin')->first();

        foreach($permissions as $permission){
            $permission->assignRole($admin);
            if($permission->name=='list-view'||$permission->name=='edit'){
                $permission->assignRole($subadmin);
            }
        }
    }
}
