<?php

namespace Entities;

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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    public function getLife()
    {
        return $this->life;
    }

    public function setLife($life)
    {
        $this->life = $life;
    }
}
