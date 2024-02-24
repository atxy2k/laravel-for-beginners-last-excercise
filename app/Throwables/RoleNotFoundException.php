<?php namespace App\Throwables;

use Exception;

class RoleNotFoundException  extends Exception{
    protected $message = 'Ocurrió un error al localizar el rol seleccionado';
}