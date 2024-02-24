<?php namespace App\Throwables;

use Exception;

class UserCouldNotBeCreatedException extends Exception{
    protected $message = 'Ocurrió un error al registrar el usuario';
}