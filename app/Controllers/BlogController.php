<?php 
namespace App\Controllers;

use App\Services\DataBase;
use League\Plates\Engine;


class BlogController{

    protected $view;
    protected $database;

    public function __construct(Engine $view, DataBase $database)
    {
        $this->view = $view;
        $this->database = $database;
    }

    public function index(){
        $categories = $this->database->getAll('categories');
        $posts = $this->database->getAll('posts');
        echo $this->view->render('Blog/index', ['posts' => $posts, 'categories' => $categories]);
    }
}