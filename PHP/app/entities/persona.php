<?php

namespace entities;

class persona
{
    private $name;
    private $age;
    private $artist;
    private $life;

    public function __construct($name, $age, $artist, $life)
    {
        $this->name = $name;
        $this->age = $age;
        $this->artist = $artist;
        $this->life = $life;
    }

    // Getter pour le nom
    public function getName()
    {
        return $this->name;
    }

    // Setter pour le nom
    public function setName($name)
    {
        $this->name = $name;
    }

    // Getter pour l'âge
    public function getAge()
    {
        return $this->age;
    }

    // Setter pour l'âge
    public function setAge($age)
    {
        $this->age = $age;
    }

    // Getter pour l'artiste
    public function getArtist()
    {
        return $this->artist;
    }

    // Setter pour l'artiste
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    // Getter pour la vie
    public function getLife()
    {
        return $this->life;
    }

    // Setter pour la vie
    public function setLife($life)
    {
        $this->life = $life;
    }
}
