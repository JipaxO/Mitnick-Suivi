<?php

class PersonaDTO
{

    public $name;
    public $age;
    public $artist;
    public $life;

    public function __construct($name, $age, $artist, $life)
    {
        $this->name = $name;
        $this->age = $age;
        $this->artist = $artist;
        $this->life = $life;
    }

    public static function fromEntity($persona)
    {
        return new PersonaDTO(
            $persona->getName(),
            $persona->getAge(),
            $persona->getArtist(),
            $persona->getLife()
        );
    }
}
