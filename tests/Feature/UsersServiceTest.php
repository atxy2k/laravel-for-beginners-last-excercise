<?php namespace Tests\Feature;

use App\Models\User;
use App\Services\UsersService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Spatie\Permission\Models\Role;

class UsersServiceTest extends TestCase {
    use RefreshDatabase;
    public function test_create_user(){
        /** UsersService */
        $usersService = $this->app->make(UsersService::class);
        $this->assertNotNull($usersService);
        $this->assertInstanceOf(UsersService::class, $usersService);
        $admin_role = Role::create(['name' => 'Admin']);
        $this->assertNotNull($admin_role);
        $user = $usersService->create([
            'name' => 'Ivan Alvarado',
            'email' => 'ivan.alvarado@serprogramador.es',
            'role_id' => $admin_role->id,
            'password' => 'inariama1110',
            'password_confirmation' => 'inariama1110',
        ]);
        $this->assertNotNull($user, $usersService->errors()->first());
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Ivan Alvarado', $user->name);
        $this->assertEquals('ivan.alvarado@serprogramador.es', $user->email);
        $this->assertEquals($admin_role->id, $user->roles()->first()->id);
        $this->assertTrue(Hash::check('inariama1110', $user->password));
    }
}