<?php

namespace App\Services\Auth;

use App\Services\DataBase;
use App\Services\Auth\LogException;

class LogService
{
    protected $dataBase;

    public function __construct(DataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }

    public function loginUser($data)
    {
        try {
            $this->validateUserData($data);
            $user  = $this->dataBase->getForEmail('users',$data['email']);
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['is_admin'] = $user['is_admin'];
            $_SESSION['status'] = $user['status'];
            $_SESSION['active'] = true;
            return header('location:/home');
        } catch (LogException $e) {
            // Обработайте исключение, например, запишите ошибку или верните сообщение об ошибке.
            $_SESSION['error'] =  $e->getMessage();
        }
    }

    

    private function validateUserData($data)
    {
        // Здесь используется AuthException для проверки данных.
        new LogException($this->dataBase,$data);
    }
}
