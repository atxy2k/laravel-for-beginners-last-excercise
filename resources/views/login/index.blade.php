@extends('templates.login')
@section('content')

    <div class="p-5 mt-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
        </div>
        @include('templates.utils.messages')
        <form class="user" action="{{ route('auth.login_attempt') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control form-control-user"
                    name="email"
                    id="exampleInputEmail" aria-describedby="emailHelp"
                    placeholder="Introduzca su correo electrónico">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="Introduzca su contraseña">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Acceder
            </button>
        </form>
    </div>

@endsection