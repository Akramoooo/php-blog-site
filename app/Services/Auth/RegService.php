<?php
namespace App\Services\Auth;

use App\Services\DataBase;


class RegService{

    protected $dataBase;

    public function __construct(DataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }

    public function makeUser($data)
    {
        $this->dataBase->create('users', $data);
    }

}