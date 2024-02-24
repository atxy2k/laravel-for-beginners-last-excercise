<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\UsersService;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(LoginRequest $request, UsersService $usersService){
        if($usersService->login($request->all())){
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }
        Alert::error($usersService->errors()->first())->flash();
        return redirect()->route('auth.login');
    }

}
