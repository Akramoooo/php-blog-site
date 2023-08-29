<?php

namespace App\Controllers;

use App\Services\DataBase;
use League\Plates\Engine;
use App\Services\ImageService;


class BlogController
{

    protected $view;
    protected $database;
    protected $imgService;

    public function __construct(Engine $view, DataBase $database, ImageService $imgService)
    {
        $this->view = $view;
        $this->database = $database;
        $this->imgService = $imgService;
    }

    public function index()
    {
        $categories = $this->database->getAll('categories');
        $posts = $this->database->getAll('posts');
        echo $this->view->render('Blog/index', ['posts' => $posts, 'categories' => $categories]);
    }

    public function store()
    {
        $file = $_FILES['image'];

        $imagePath = $this->imgService->makeImg($file, 'images/');
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'image' => $imagePath,
            'category_id' => $_POST['category_id']
        ];
        var_dump($data);
        $this->database->create('posts', $data);
        return $data['title'];
    }
}
