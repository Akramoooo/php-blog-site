<?php

namespace App\Services\Auth;

use Exception;

class AuthException extends Exception
{
    public function __construct($data)
    {
        if ($data['name'] == null) {
            throw new Exception("Имя должно быть заполнено");  
        } elseif ($data['email'] == null) {
            throw new Exception( "Поле email должно быть заполнено");
        } elseif ($data['password'] == null) {
            throw new Exception( "Поле password должно быть заполнено");
        } elseif ($data['password'] != $data['confirm']) {
            throw new Exception( "Пароли не совпадают");
        }

        return header("Location: /home");
    }
}
