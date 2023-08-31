<?php

namespace App\Services;

use PDO;
use Aura\SqlQuery\QueryFactory;

class DataBase
{

    protected $pdo;
    protected $queryfactory;

    public function __construct(QueryFactory $queryfactory)
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=master", "root", "");
        $this->queryfactory = $queryfactory;
    }

    public function getAll($table)
    {
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    public function getOne($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getForEmail($table, $email)
    {
        $sql = "SELECT * FROM $table WHERE email = :email";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($table, $data)
    {
        $insert = $this->queryfactory->newInsert();
        $insert
            ->into($table)
            ->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }

    public function update($table, $data)
    {
        $sql = "UPDATE $table SET $data";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }
}
