<?php 
namespace App\Controllers;

use App\Services\DataBase;
use League\Plates\Engine;


class HomeController{

    protected $view;
    protected $database;

    public function __construct(Engine $view, DataBase $database)
    {
        $this->view = $view;
        $this->database = $database;
    }

    public function index(){
        $posts = $this->database->getAll('posts');
        echo $this->view->render('Home/index', ['posts' => $posts]);
    }
}