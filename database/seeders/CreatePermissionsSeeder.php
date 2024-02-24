<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreatePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view any user',
            'view user',
            'show user',
            'add user',
            'change user',
            'delete user',
            'view any role',
            'view role',
            'add role',
            'change role',
            'delete role'
        ];
        foreach($permissions as $permission){
            $existent = Permission::where('name', $permission)->first();
            if(is_null($existent)){
                Permission::create(['name' => $permission]);
            }
        }
    }
}
