<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateFirstRoleAndUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role = Role::where('name', 'admin')->first();
        if(is_null($admin_role)){
            $admin_role = Role::create(['name' => 'Admin']);
        }
        $admin_user = User::where('email','ivan.alvarado@serprogramador.es')->first();
        if(is_null($admin_user)){
            $user = User::create([
                'name' => 'Ivan Alvarado',
                'email' => 'ivan.alvarado@serprogramador.es',
                'password' => bcrypt('inariama1110')
            ]);
            $user->assignRole($admin_role->name);
        }
    }
}
