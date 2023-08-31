<?php
namespace App\Controllers\Auth;

use App\Services\Auth\LogService;
use League\Plates\Engine;

class LogController {

    protected $logService;
    protected $view;

    public function __construct(LogService $logService, Engine $view)
    {
        $this->logService = $logService;
        $this->view = $view;
    }

    public function logForm(){
        echo $this->view->render('Auth/LogForm');
    }

    public function loginer(){
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        $this->logService->loginUser($data);
    }

    public function logOut(){
        session_destroy();
        return header('location:/home');
    }
}