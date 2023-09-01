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
        $user = $this->db->getForEmail('users', $data['email']);

        if ($data['email'] == null) {
            throw new Exception("email не должен быть пустым");
        } elseif ($data['password'] == null) {
            throw new Exception("password не должен быть пустым");
        } elseif ($data['email'] != $user['email'] || !password_verify($data['password'], $user['password'])){
            throw new Exception("Нету такого пользователя");
        }
        header("Location: /home");
        exit;
    }
}