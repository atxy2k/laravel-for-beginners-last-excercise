<?php namespace App\Services;

use App\Infrastructure\BaseService;
use App\Models\User;
use App\Throwables\RoleNotFoundException;
use App\Throwables\UserCouldNotBeCreatedException;
use App\Validators\UsersValidator;
use Throwable;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersService extends BaseService {

    public function __construct(private UsersValidator $usersValidator){
        parent::__construct();
    }

    public function create(array $data) : ?User{
        $return = null;
        try
        {
            DB::beginTransaction();
            throw_unless($this->usersValidator->with($data)->passes(UsersValidator::CREATE), 
                new Exception($this->usersValidator->errors()->first()));
            $role = Role::findById(Arr::get($data,'role_id'));
            throw_if(is_null($role), RoleNotFoundException::class);
            $user_data = Arr::only($data,['name','email','password']);
            $user_data['password'] = bcrypt($user_data['password']);
            $user = User::create($user_data);
            throw_if(is_null($user), UserCouldNotBeCreatedException::class);
            $user->assignRole($role->name);
            DB::commit();
            $return = $user;
        }
        catch(Throwable $e)
        {
            $this->pushError($e->getMessage());
            DB::rollBack();
        }
        return $return;
    }

}