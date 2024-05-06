<?php

namespace Repositories;

use PDO;

class PersonaRepositories
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=mysql;dbname=Exos", "root", "root");
    }

    public function createPersona($data)
    {
        $query = $this->pdo->prepare("INSERT INTO personas (name, age, artist, life) VALUES (:name, :age, :artist, :life)");
        $query->execute($data);
    }

    public function updatePersona($id, $data)
    {
        $query = $this->pdo->prepare("UPDATE personas SET name = :name, age = :age, artist = :artist, life = :life WHERE id = :id");
        $query->execute($data);
    }

    public function deletePersona($id)
    {
        $query = $this->pdo->prepare("DELETE FROM personas WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    public function getPersona($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM personas WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function getAllPersonas()
    {
        $query = $this->pdo->prepare("SELECT * FROM personas");
        $query->execute();
        return $query->fetchAll();
    }
}
