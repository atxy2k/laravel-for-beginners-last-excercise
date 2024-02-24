@extends('templates.login')
@section('content')

    <div class="p-5 mt-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
        </div>
        <form class="user">
            <div class="form-group">
                <input type="email" class="form-control form-control-user"
                    id="exampleInputEmail" aria-describedby="emailHelp"
                    placeholder="Enter Email Address...">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember
                        Me</label>
                </div>
            </div>
            <a href="index.html" class="btn btn-primary btn-user btn-block">
                Login
            </a>
        </form>
    </div>

@endsection