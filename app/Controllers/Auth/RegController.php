<?php
namespace App\Controllers\Auth;

use App\Services\Auth\RegService;
use League\Plates\Engine;

class RegController {

    protected $regService;
    protected $view;

    public function __construct(RegService $regService, Engine $view)
    {
        $this->regService = $regService;
        $this->view = $view;
    }

    public function regForm(){
        echo $this->view->render('Auth/regForm');
    }

    public function register(){
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'confirm' => $_POST['confirm'],
        ];
        $this->regService->makeUser($data);
    }
}