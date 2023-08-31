<?php

namespace App\Services\Auth;

use App\Services\DataBase;

class RegService
{
    protected $dataBase;

    public function __construct(DataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }

    public function makeUser($data)
    {
        try {
            // Проверка данных. Здесь вызывается AuthException, если данные не корректны.
            $this->validateUserData($data);
            unset($data['confirm']);
            $data['password'] = md5($data['password']);
            $this->dataBase->create('users', $data);
            return header('location:/home');
        } catch (AuthException $e) {
            // Обработайте исключение, например, запишите ошибку или верните сообщение об ошибке.
            echo $e->getMessage();
        }
    }

    private function validateUserData($data)
    {
        // Здесь используется AuthException для проверки данных.
        new AuthException($data);
    }
}
