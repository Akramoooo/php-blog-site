<?php

namespace App\Controllers\Auth;

use App\Services\Auth\LogService;
use League\Plates\Engine;
use App\Services\DataBase;

class LogController
{

    protected $logService;
    protected $view;
    protected $db;

    public function __construct(LogService $logService, Engine $view, DataBase $db)
    {
        $this->logService = $logService;
        $this->view = $view;
        $this->db = $db;
    }

    public function logForm()
    {
        echo $this->view->render('Auth/LogForm');
    }

    public function loginer()
    {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $this->logService->loginUser($data);
    }

    public function checkIsHave()
    {
        $user = $this->db->getForEmail('users', $_POST['email']);
        if ($user['email'] = $_POST['emailEl'] && !password_verify($_POST['password'], $user['password'])) {
            return $user;
        } else {
            return null;
        }
    }


    public function logOut()
    {
        session_destroy();
        return header('location:/home');
    }
}
