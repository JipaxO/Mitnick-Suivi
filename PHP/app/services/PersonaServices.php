<?php

namespace Services;

interface PersonaServices
{
    public function createPersona($data);
    public function updatePersona($id, $data);
    public function deletePersona($id);
    public function getPersona($id);
    public function getAllPersonas();
}
