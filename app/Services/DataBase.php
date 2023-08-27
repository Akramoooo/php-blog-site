<?php 
namespace App\Services;

use PDO;

class DataBase{

    protected $pdo; 

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=master","root", "");
    }

    public function getAll($table) {
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $posts;
    }

    public function getOne($table,$id){
        $sql = "SELECT * FROM $table WHERE id = $id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($table,$data){
        $sql = "INSERT INTO $table  VALUES $data";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    public function update($table,$data){
        $sql = "UPDATE $table SET $data";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    public function delete($table,$id){
        $sql = "DELETE FROM $table WHERE id = $id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }


}