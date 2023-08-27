<?php
namespace App\Controllers;

use App\Services\DataBase;

class Controller {

    protected $database;

    public function __construct(DataBase $database)
    {
        $this->database = $database;
    }
}