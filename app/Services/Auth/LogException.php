<?php

namespace App\Services\Auth;

use Exception;
use App\Services\DataBase;

class LogException extends Exception
{

    protected $db; 

    public function __construct(DataBase $db, $data)
    {
        $this->db = $db;


        if ($data['email'] == null) {
            $_SESSION['error'] = "Пожалуйста, введите почту";
        } elseif ($data['password'] == null) {
            $_SESSION['error'] = "Поле пароль не должно быть пустым";
        } elseif ($this->db->getForEmail('users', $data['email']) == null){
            $_SESSION['error'] = "Нету такого пользователя";
        }
    }
}