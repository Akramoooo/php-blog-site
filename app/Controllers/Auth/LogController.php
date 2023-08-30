<?php
namespace App\Controllers\Auth;

use App\Services\Auth\LogService;
use League\Plates\Engine;

class LogController {

    protected $regService;
    protected $view;

    public function __construct(LogService $regService, Engine $view)
    {
        $this->regService = $regService;
        $this->view = $view;
    }

    public function logForm(){
        echo $this->view->render('Auth/LogForm');
    }
}