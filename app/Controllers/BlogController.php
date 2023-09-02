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
        $this->database->create('posts', $data);
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function show($id)
    {
        $categories = $this->database->getAll('categories');
        $post = $this->database->getOne('posts', $id);
        echo $this->view->render('Blog/show', ['post' => $post, 'categories' => $categories]);
    }

    public function addComment()
    {
        $this->database->create('comments', ['title' => $_POST['comment']]);
        $id = $this->database->getLastInsertId('comments');
        $postId = $_POST['id'];
        $this->database->create('post_comments', ['post_id' => $postId, 'comment_id' => $id]);
        $result = $this->database->getOnePostComment($postId, $id);
    }
}
