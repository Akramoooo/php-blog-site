<?php

namespace App\Services\Auth;

use Exception;

class AuthException extends Exception
{
    public function __construct($data)
    {
        if ($data['name'] == null) {
            $_SESSION['error'] = "Имя должно быть заполнено";
        } elseif ($data['email'] == null) {
            $_SESSION['error'] = "Поле email должно быть заполнено";
        } elseif ($data['password'] == null) {
            $_SESSION['error'] = "Поле password должно быть заполнено";
        } elseif ($data['password'] != $data['confirm']) {
            $_SESSION['error'] = "Пароли не совпадают";
        }

        header("Location: /auth/regForm");
        exit;
    }
}
